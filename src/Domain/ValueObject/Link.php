<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Link
{
    private string $title;
    private string $author;
    private int $width;
    private int $height;
    private ?int $duration = null;

    public static function create(string $title, string $author, int $width, int $height, ?int $duration): self
    {
        $self = new self();

        $self->title = $title;
        $self->author = $author;
        $self->width = $width;
        $self->height = $height;
        $self->duration = $duration;

        return $self;
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
}