<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\DeleteABookmark;

use App\Application\GetABookmark\GetABookmark as Message;
use App\Domain\Exception\BookmarkNotFoundException;
use App\Infrastructure\SynchronousBusInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Routing\Annotation\Route;

final class DeleteABookmark
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