<?php

namespace App\Entity;

use App\Repository\BookmarkRepository;
use Doctrine\ORM\Mapping as ORM;
use Guikingone\SymfonyUid\Doctrine\Uuid\UuidGenerator;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BookmarkRepository::class)
 */
class Bookmark
{
    public const TYPES = [
        'video',
        'photo',
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
    private $uuid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"bookmark:read"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"bookmark:read"})
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"bookmark:read"})
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     *
     * @Groups({"bookmark:read"})
     */
    private $height;

    /**
     * @var int
     * @ORM\Column(type="integer")
     *
     * @Groups({"bookmark:read"})
     */
    private $width;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Choice(choices=Bookmark::TYPES, message="Choose a valid type.")
     * @Assert\NotBlank
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $type;

    /**
     * @var array
     *
     * @ORM\Column(type="array", length=255)
     *
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $tags;

    public function __construct()
    {
        $this->uuid = UuidV4::v4();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
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

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function addTag(string $tag): self
    {
        $this->tags[] = $tag;

        return $this;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
}
