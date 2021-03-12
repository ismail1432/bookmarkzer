<?php

namespace App\Controller;

use App\Entity\Bookmark;
use App\Exception\InvalidPayloadException;
use App\Repository\BookmarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/bookmarks", name="bookmark")
 */
class BookmarkController
{
    private $serializer;
    private $validator;
    private $manager;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $manager)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @Route("/{uuid}", name="_get_item", methods="GET")
     */
    public function getItemAction(string $uuid): Response
    {
        dump($uuid);die;
        return new Response($this->serializer->serialize($bookmark, 'json'), 200);
    }

    /**
     * @Route("/{uuid}", name="_delete", methods="DELETE")
     */
    public function deleteItemAction(Bookmark $bookmark): Response
    {
        return new Response(null, 204);
    }

    /**
     * @Route("/{uuid}", name="_update", methods="PUT")
     */
    public function updateItemAction(Bookmark $bookmark, Request $request): Response
    {
        $bookmark = $this->serializer->deserialize($request->getContent(), Bookmark::class, $request->getContentType());
        $errors = $this->validator->validate($bookmark);

        if($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $this->manager->flush();

        return new Response($this->serializer->serialize($bookmark, 'json'), 201);
    }

    /**
     * @Route("/", name="_create", methods="POST")
     */
    public function createItemAction(Bookmark $bookmark, Request $request): Response
    {
        $bookmark = $this->serializer->deserialize($request->getContent(), Bookmark::class, $request->getContentType());
        $errors = $this->validator->validate($bookmark);

        if($errors->count() > 0) {
            throw new InvalidPayloadException($errors);
        }

        $this->manager->persist($bookmark);
        $this->manager->flush();

       return new Response($this->serializer->serialize($bookmark, 'json'), 200);
    }

    /**
     * @Route("/", name="_get_collection", methods="GET")
     */
    public function getCollectionAction(BookmarkRepository $repository): Response
    {
        return new Response($this->serializer->serialize($repository->findAll(), 'json'), 200);
    }
}
