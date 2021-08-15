<?php

namespace App\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Guikingone\SymfonyUid\Doctrine\Uuid\UuidGenerator;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

/**
 * @ORM\Entity
 */
class Bookmark
{
    public const TYPES = [
        'video',
        'photo',
    ];

    public const SUPPORTED_HOST = [
        'www.flickr.com',
        'www.vimeo.com',
    ];

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Uuid
     *
     * @ORM\Column(name="uuid", type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private Uuid $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $link;

    /**
     * @ORM\Column(type="integer")
     */
    private int $height;

    /**
     * @ORM\Column(type="integer")
     */
    private int $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $duration = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $type;

    /**
     * @ORM\Column(type="array", length=255)
     */
    private array $tags = [];

    public static function create(string $title, string $author, string $link, int $height, int $width, string $type, array $tags = [], ?int $duration = null): self
    {
        $self = new self();

        $self->uuid = UuidV4::v4();
        $self->createdAt = new \DateTimeImmutable();
        $self->title = $title;
        $self->author = $author;
        $self->link = $link;
        $self->height = $height;
        $self->width = $width;
        $self->duration = $duration;
        $self->type = $type;
        $self->tags = $tags;

        return $self;
    }

    public function update(string $title, string $author, string $link, int $height, int $width, string $type, array $tags = [], ?int $duration = null): self
    {
        $this->title = $title;
        $this->author = $author;
        $this->link = $link;
        $this->height = $height;
        $this->width = $width;
        $this->duration = $duration;
        $this->type = $type;
        $this->tags = $tags;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
