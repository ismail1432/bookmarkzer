<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class BookmarkType
{
    public const VIDEO = 'video';
    public const PHOTO = 'photo';
    public const ALL = [
        self::PHOTO,
        self::VIDEO,
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::ALL)) {
            throw new \LogicException(sprintf('Unsupported value : %s, supported values are %s', $value, implode(', ', self::ALL)));
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function createFromHost(string $host): self
    {
        $types = [
        'www.flickr.com' => self::PHOTO,
        'www.vimeo.com' => self::VIDEO,
        ];

        return new self($types[$host]);
    }
}
