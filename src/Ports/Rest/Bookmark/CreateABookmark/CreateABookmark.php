<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\CreateABookmark;

use App\Application\CreateABookmark\CreateABookmarkCommand;
use App\Domain\ValueObject\Url;
use App\Exception\InvalidPayloadException;
use App\Infrastructure\SynchronousBusInterface;
use App\Ports\Rest\Bookmark\Common\BookmarkOutput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;

final class CreateABookmark
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
     * @Route("/bookmarks", name="bookmark_create", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $body = \json_decode($request->getContent(), true);
        $payload = new Payload();

        $payload->link = $body['link'] ?? null;
        $payload->tags = $body['tags'] ?? null;

        $errors = $this->validator->validate($payload);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $bookmark = $this->bus->handle(
            new CreateABookmarkCommand(new Url($payload->link), $payload->tags));

        $output = BookmarkOutput::create($bookmark);

        return new Response($this->serializer->serialize($output, 'json'), 201);
    }
}