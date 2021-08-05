<?php

namespace App\Infrastructure\Repository;

use App\Domain\Exception\BookmarkNotFoundException;
use App\Domain\Model\Bookmark;
use App\Domain\Repository\BookmarkRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Uid\UuidV4;

class BookmarkRepository implements BookmarkRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getById(UuidV4 $uuid): Bookmark
    {
        $bookmark = $this->entityManager->createQueryBuilder()
            ->select('b')
            ->from(Bookmark::class, 'b')
            ->where('b.uuid = :uuid')
            ->setParameter(':uuid', $uuid->__toString())
            ->getQuery()
            ->getOneOrNullResult()
            ;

        if (null === $bookmark) {
            throw BookmarkNotFoundException::notFound($uuid);
        }

        return $bookmark;
    }

    public function save(Bookmark $bookmark): void
    {
        $this->entityManager->persist($bookmark);
        $this->entityManager->flush();
    }

    public function delete(UuidV4 $uuid): void
    {
        $bookmark = $this->getById($uuid);

        $this->entityManager->remove($bookmark);
        $this->entityManager->flush();
    }

    public function findAll(): array
    {
        return  $this->entityManager->createQueryBuilder()
            ->select('b')
            ->from(Bookmark::class, 'b')
            ->getQuery()
            ->getResult()
            ;
    }
}
