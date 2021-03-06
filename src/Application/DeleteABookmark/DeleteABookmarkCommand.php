<?php

declare(strict_types=1);

namespace App\Application\DeleteABookmark;

use Symfony\Component\Uid\UuidV4;

final class DeleteABookmarkCommand
{
    private UuidV4 $bookmarkId;

    public function __construct(UuidV4 $bookmarkId)
    {
        $this->bookmarkId = $bookmarkId;
    }

    public function getBookmarkId(): UuidV4
    {
        return $this->bookmarkId;
    }
}
