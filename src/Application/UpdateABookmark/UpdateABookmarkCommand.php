<?php

declare(strict_types=1);

namespace App\Application\UpdateABookmark;

use App\Domain\ValueObject\Url;
use Symfony\Component\Uid\UuidV4;

final class UpdateABookmarkCommand
{
    private UuidV4 $bookmarkId;
    private Url $url;
    private array $tags;

    public function __construct(UuidV4 $bookmarkId, Url $url, array $tags = [])
    {
        $this->bookmarkId = $bookmarkId;
        $this->url = $url;
        $this->tags = $tags;
    }

    public function getBookmarkId(): UuidV4
    {
        return $this->bookmarkId;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function getTags(): array
    {
        return $this->tags;
    }
}