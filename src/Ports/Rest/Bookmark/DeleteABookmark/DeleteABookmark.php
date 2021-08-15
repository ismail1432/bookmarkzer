<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\DeleteABookmark;

use App\Application\GetABookmark\GetABookmarkCommand as Message;
use App\Domain\Exception\BookmarkNotFoundException;
use App\Infrastructure\Transport\SynchronousBusInterface;
use App\Ports\Rest\RestRoutingInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\UuidV4;

final class DeleteABookmark implements RestRoutingInterface
{
    private SynchronousBusInterface $bus;

    public function __construct(SynchronousBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @Route("/bookmarks/{id}", name="bookmark_delete", methods={"DELETE"}, requirements={"page"="/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/"})
     */
    public function __invoke(string $id): Response
    {
        try {
            $this->bus->handle(new Message(UuidV4::fromString($id)));
        } catch (BookmarkNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return new Response(null, 204);
    }
}
