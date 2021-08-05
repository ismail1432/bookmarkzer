<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark;

use App\Domain\Model\Bookmark;

final class BookmarkOutput
{
    private $id;
    private string $title;
    private string $author;
    private string $url;
    private int $width;
    private int $height;
    private \DateTimeInterface $createdAt;
    private ?int $duration = null;

    public static function create(Bookmark $bookmark): self
    {
        $self = new self();

        $self->id = $bookmark->getUuid();
        $self->title = $bookmark->getTitle();
        $self->author = $bookmark->getAuthor();
        $self->url = $bookmark->getUrl();
        $self->width = $bookmark->getWidth();
        $self->height = $bookmark->getHeight();
        $self->createdAt = $bookmark->getCreatedAt();
        $self->duration = $bookmark->getDuration();

        return $self;
    }

    /**
     * @param Bookmark[] $data
     *
     * @return self[]
     */
    public static function createFromArray(array $data = [])
    {
        if ([] === $data) {
            return [];
        }

        $bookmarks = [];
        foreach ($data as $bookmark) {
            $bookmarks['items'][] = self::create($bookmark);
        }

        $bookmarks['total'] = count($bookmarks['items']);

        return $bookmarks;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}
