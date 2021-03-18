<?php

namespace App\Bookmark;

use App\Entity\Bookmark;

class BookmarkHandler
{
    public static function hydrate(Bookmark $bookmark): Bookmark
    {
        $properties = BookmarkProperty::createFromLink($bookmark->getUrl());

        $bookmark->setAuthor($properties->author);
        $bookmark->setTitle($properties->title);
        $bookmark->setWidth($properties->width);
        $bookmark->setHeight($properties->height);

        return $bookmark;
    }
}
