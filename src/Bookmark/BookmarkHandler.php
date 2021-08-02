<?php

namespace App\Bookmark;

use App\Entity\Bookmark;

class BookmarkHandler
{
    private $bookmarkProperty;

    public function __construct(BookmarkPropertyInterface $bookmarkProperty)
    {
        $this->bookmarkProperty = $bookmarkProperty;
    }

    public function hydrate(Bookmark $bookmark, array $data = []): Bookmark
    {
        foreach ($data as $key => $value) {
            $bookmark->{$key} = $value;
        }

        $properties = $this->bookmarkProperty::createFromLink($bookmark->getUrl());

        $bookmark->author = $properties->author;
        $bookmark->title = $properties->title;
        $bookmark->width = $properties->width;
        $bookmark->height = $properties->height;

        return $bookmark;
    }
}
