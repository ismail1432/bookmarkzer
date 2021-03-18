<?php

namespace App\Controller;

use App\Bookmark\BookmarkHandler;
use App\Entity\Bookmark;
use App\Exception\InvalidPayloadException;
use App\Repository\BookmarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/bookmarks", name="bookmark")
 */
class BookmarkController
{
    private $serializer;
    private $validator;
    private $manager;
    private $repository;
    private $handler;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $manager, BookmarkRepository $repository, BookmarkHandler $handler)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->manager = $manager;
        $this->repository = $repository;
        $this->handler = $handler;
    }

    /**
     * @Route("/{uuid}", name="_get_item", methods={"GET"})
     */
    public function getItemAction(string $uuid): Response
    {
        if (null === $bookmark = $this->repository->findByUuid($uuid)) {
            return new Response(null, 404);
        }

        return new Response($this->serializer->serialize($bookmark, 'json', ['groups' => 'bookmark:read']), 200);
    }

    /**
     * @Route("/{uuid}", name="_delete", methods={"DELETE"})
     */
    public function deleteItemAction($uuid): Response
    {
        if (null === $bookmark = $this->repository->findByUuid($uuid)) {
            return new Response(null, 404);
        }

        return new Response(null, 204);
    }

    /**
     * @Route("/{uuid}", name="_update", methods={"PUT"})
     */
    public function updateItemAction($uuid, Request $request): Response
    {
        if (null === $bookmark = $this->repository->findByUuid($uuid)) {
            return new Response(null, 404);
        }

        /** @var Bookmark $payload */
        $bookmark = $this->handler->hydrate($bookmark, \json_decode($request->getContent(), true));
        $errors = $this->validator->validate($bookmark);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $this->manager->flush();

        return new Response($this->serializer->serialize($bookmark, 'json', ['groups' => 'bookmark:read']), 200);
    }

    /**
     * @Route(name="_get_collection", methods={"GET"})
     */
    public function getCollectionAction(BookmarkRepository $repository): Response
    {
        return new Response($this->serializer->serialize($repository->findAll(), 'json', ['groups' => 'bookmark:read']), 200);
    }

    /**
     * @Route(name="_create", methods={"POST"})
     */
    public function createItemAction(Request $request): Response
    {
        /** @var Bookmark $bookmark */
        $bookmark = $this->serializer->deserialize($request->getContent(), Bookmark::class, $request->getContentType(), ['groups' => 'bookmark:write']);
        $bookmark = $this->handler->hydrate($bookmark);
        $errors = $this->validator->validate($bookmark);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $this->manager->persist($bookmark);
        $this->manager->flush();

        return new Response($this->serializer->serialize($bookmark, 'json', ['groups' => 'bookmark:read']), 201);
    }
}
