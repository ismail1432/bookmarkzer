<?php

namespace App\Domain;

use App\Domain\ValueObject\Link;

interface EmbedInterface
{
    public function get(string $link): Link;
}