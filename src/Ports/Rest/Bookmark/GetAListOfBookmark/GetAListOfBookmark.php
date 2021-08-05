<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\GetAListOfBookmark;

use App\Application\GetAListOfBookmark\GetAListOfBookmark as GetAListOfBookmarkMessage;
use App\Infrastructure\Transport\SynchronousBusInterface;
use App\Ports\Rest\Bookmark\Common\BookmarkOutput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class GetAListOfBookmark
{
    private SynchronousBusInterface $bus;
    private SerializerInterface $serializer;

    public function __construct(SynchronousBusInterface $bus, SerializerInterface $serializer)
    {
        $this->bus = $bus;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/bookmarks", name="bookmark_collection", methods={"GET"})
     */
    public function __invoke(Request $request): Response
    {
        $bookmark = $this->bus->handle(new GetAListOfBookmarkMessage(
                $request->query->getInt('page'),
                $request->query->getInt('limit', 15)
            ));

        $output = BookmarkOutput::createFromArray($bookmark);

        return new Response($this->serializer->serialize($output, 'json'), 200);
    }
}
