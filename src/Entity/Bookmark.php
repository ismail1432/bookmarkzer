<?php

namespace App\Entity;

use App\Repository\BookmarkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Guikingone\SymfonyUid\Doctrine\Uuid\UuidGenerator;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

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
     *
     */
    private $uuid;

    /**
     *
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     *
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     *
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $height;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Choice(choices=Bookmark::TYPES, message="Choose a valid type.")
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $type;

    /**
     * @ORM\Column(type="array", length=255)
     *
     * @Groups({"bookmark:read", "bookmark:write"})
     */
    private $tags;

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

    public function updateFromPayload(Bookmark $bookmark): self
    {
        $this->type = $bookmark->getType();
        $this->author = $bookmark->getAuthor();
        $this->tags = $bookmark->getTags();
        $this->url = $bookmark->getUrl();
        $this->title = $bookmark->getTitle();
        $this->duration = $bookmark->getDuration();
        $this->width = $bookmark->getWidth();
        $this->height = $bookmark->getHeight();
    }
}
