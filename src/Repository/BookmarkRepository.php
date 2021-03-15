<?php

namespace App\Repository;

use App\Entity\Bookmark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bookmark|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bookmark|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bookmark[]    findAll()
 * @method Bookmark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookmarkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bookmark::class);
    }

    public function findByUuid(string $uuid): ?Bookmark
    {
        return $this->createQueryBuilder('bookmark')
            ->where('bookmark.uuid = :uuid')
            ->setParameter(':uuid', $uuid)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
