<?php

namespace App\Bookmark;

interface BookmarkPropertyInterface
{
    public static function createFromLink(string $link): self;
}
