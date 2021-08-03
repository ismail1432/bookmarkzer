<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Bookmark;
use Symfony\Component\Uid\UuidV4;

interface BookmarkRepositoryInterface
{
    public function getById(UuidV4 $uuid): Bookmark;

    public function save(Bookmark $bookmark): void;

    public function delete(UuidV4 $uuid): void;
}