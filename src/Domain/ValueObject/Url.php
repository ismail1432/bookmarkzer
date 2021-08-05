<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Url
{
    private string $value;

    public function __construct(string $value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new \RuntimeException('Invalid url given');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
