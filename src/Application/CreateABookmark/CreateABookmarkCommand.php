<?php

declare(strict_types=1);

namespace App\Application\CreateABookmark;

use App\Domain\ValueObject\Url;

final class CreateABookmarkCommand
{
    private Url $url;
    private array $tags;

    public function __construct(Url $url, array $tags = [])
    {
        $this->url = $url;
        $this->tags = $tags;
    }

    public function getUrl (): Url
    {
        return $this->url;
    }

    public function getTags(): array
    {
        return $this->tags;
    }
}