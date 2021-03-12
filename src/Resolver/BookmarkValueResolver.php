<?php

namespace App\Resolver;

use App\Controller\BookmarkController;
use App\Repository\BookmarkRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

class BookmarkValueResolver implements ArgumentValueResolverInterface
{
    private $bookmarkRepository;

    public function __construct(BookmarkRepository $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return UuidV4::isValid($request->get('uuid', '')) && $this->getControllerName($request) == BookmarkController::class;
    }

    /**
     * @return Uuid|null
     */
    public function resolve(Request $request, ArgumentMetadata $argument): \Iterator
    {
        $result = $this->bookmarkRepository->findOneBy(['uuid' => $request->get('uuid')]);

        dump($result);die;
    }

    private function getControllerName(Request $request): ?string
    {
        $request->attributes->get('_controller');

        return explode('::', $request->attributes->get('_controller'))[0] ?? null;
    }
}