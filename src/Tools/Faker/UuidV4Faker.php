<?php

namespace App\Tools\Faker;

use Symfony\Component\Uid\UuidV4;

class UuidV4Faker
{
    public function uuidv4(): UuidV4
    {
        return UuidV4::v4();
    }
}