<?php

namespace App\Port\Rest\Event;

use App\Exception\InvalidPayloadException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationList;

class InvalidPayloadExceptionListener implements EventSubscriberInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function onKernelException(ExceptionEvent $event)
    {
        /** @var InvalidPayloadException $exception */
        $exception = $event->getThrowable();

        if (!$this->supports($exception)) {
            return;
        }

        $response = (new Response())
            ->setContent($this->serializer->deserialize($exception->getConstraintViolationList(), ConstraintViolationList::class, 'json'))
            ->setStatusCode(400)
        ;

        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    private function supports(\Throwable $exception)
    {
        return $exception instanceof InvalidPayloadException;
    }
}
