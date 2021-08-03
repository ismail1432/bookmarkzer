<?php

namespace App\Ports\Rest\Bookmark\GetABookmark;

use App\Domain\Exception\BookmarkNotFoundException;
use App\Infrastructure\SynchronousBusInterface;
use App\Ports\Rest\Bookmark\Common\BookmarkOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use App\Application\GetABookmark\GetABookmark as GetABookMarkMessage;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Routing\Annotation\Route;

final class GetABookmark
{
    private SynchronousBusInterface $bus;
    private SerializerInterface $serializer;

    public function __construct(SynchronousBusInterface $bus, SerializerInterface $serializer)
    {
        $this->bus = $bus;
        $this->serializer = $serializer;
    }
    /**
     * @Route("/bookmarks/{id}", name="bookmark_read", methods={"GET"}, requirements={"page"="/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/"})
     */
    public function __invoke(string $id): Response
    {
        try {
            $bookmark = $this->bus->handle(new GetABookMarkMessage(UuidV4::fromString($id)));
        } catch (BookmarkNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        $output = BookmarkOutput::create($bookmark);

        return new Response($this->serializer->serialize($output, 'json'), 200);
    }
}