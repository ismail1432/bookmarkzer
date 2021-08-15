<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark;

use App\Domain\Model\Bookmark;

final class BookmarkOutput
{
    private $id;
    private string $title;
    private string $author;
    private string $link;
    private int $width;
    private int $height;
    private \DateTimeInterface $createdAt;
    private ?int $duration = null;
    private ?string $type;
    private array $tags = [];

    public static function create(Bookmark $bookmark): self
    {
        $self = new self();

        $self->id = $bookmark->getUuid();
        $self->title = $bookmark->getTitle();
        $self->author = $bookmark->getAuthor();
        $self->link = $bookmark->getLink();
        $self->width = $bookmark->getWidth();
        $self->height = $bookmark->getHeight();
        $self->createdAt = $bookmark->getCreatedAt();
        $self->duration = $bookmark->getDuration();
        $self->tags = $bookmark->getTags();
        $self->type = $bookmark->getType();

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

    public function getLink(): string
    {
        return $this->link;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
