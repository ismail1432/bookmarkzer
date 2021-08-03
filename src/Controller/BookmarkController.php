<?php

namespace App\Controller;

use App\Domain\Model\Bookmark;
use App\Exception\InvalidPayloadException;
use App\Domain\Repository\BookmarkRepositoryInterface as BookmarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/bookm", name="bookmark")
 */
class BookmarkController
{
    private $serializer;
    private $validator;
    private $manager;
    private $repository;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $manager, BookmarkRepository $repository)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->manager = $manager;
        $this->repository = $repository;
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
        $payload = $this->serializer->deserialize($request->getContent(), Bookmark::class, $request->getContentType(), ['groups' => 'bookmark:write']);
        $errors = $this->validator->validate($payload);

        $data = \json_decode($request->getContent(), true);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }
        $bookmark->updateFromPayload($data);

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
        $errors = $this->validator->validate($bookmark);

        if ($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $this->manager->persist($bookmark);
        $this->manager->flush();

        return new Response($this->serializer->serialize($bookmark, 'json', ['groups' => 'bookmark:read']), 201);
    }
}
