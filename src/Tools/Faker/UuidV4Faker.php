<?php

namespace App\Tools\Faker;

use Symfony\Component\Uid\UuidV4;

final class UuidV4Faker
{
    public function uuidv4(?string $uuid = null): UuidV4
    {
        return $uuid ? UuidV4::fromString($uuid) : UuidV4::v4();
    }
}
