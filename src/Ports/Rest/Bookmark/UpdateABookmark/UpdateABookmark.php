<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\UpdateABookmark;

use App\Application\CreateABookmark\CreateABookmarkCommand;
use App\Application\UpdateABookmark\UpdateABookmarkCommand;
use App\Domain\Exception\BookmarkNotFoundException;
use App\Domain\ValueObject\Url;
use App\Infrastructure\Transport\SynchronousBusInterface;
use App\Ports\Rest\Bookmark\BookmarkOutput;
use App\Ports\Rest\Exception\InvalidPayloadException;
use App\Ports\Rest\RestRoutingInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;


final class UpdateABookmark implements RestRoutingInterface
{
    private SynchronousBusInterface $bus;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    public function __construct(SynchronousBusInterface $bus, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->bus = $bus;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @Route("/bookmarks/{id}", name="bookmark_update", methods={"PUT"}, requirements={"page"="/\w{8}-\w{4}-\w{4}-\w{4}-\w{12}/"})
     */
    public function __invoke(Request $request, string $id): Response
    {
        $body = \json_decode($request->getContent(), true);
        $payload = new Payload();

        $payload->link = $body['link'] ?? null;
        $payload->tags = $body['tags'] ?? [];

        $errors = $this->validator->validate($payload);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        try {
            $bookmark = $this->bus->handle(
                new UpdateABookmarkCommand(UuidV4::fromString($id), new Url($payload->link), $payload->tags)
            );
        } catch (BookmarkNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        $output = BookmarkOutput::create($bookmark);

        return new Response($this->serializer->serialize($output, 'json'), 200);
    }
}
