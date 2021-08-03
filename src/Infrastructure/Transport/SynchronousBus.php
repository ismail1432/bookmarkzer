<?php

namespace App\Infrastructure\Transport;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class SynchronousBus implements SynchronousBusInterface
{
    public function __construct(MessageBusInterface $bus)
    {
        $this->messageBus = $bus;
    }

    use HandleTrait {
        handle as handleMessage;
    }

    public function handle(object $message)
    {
        return $this->handleMessage($message);
    }
}