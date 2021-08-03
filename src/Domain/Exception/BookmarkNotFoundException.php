<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use Symfony\Component\Uid\UuidV4;

final class BookmarkNotFoundException extends \RuntimeException
{
    public static function notFound(UuidV4 $uuid)
    {
        return new self(sprintf("There is no bookmark for id: %s", $uuid->__toString()));
    }
}