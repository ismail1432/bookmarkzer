<?php

namespace App\Tests\Bookmark;

use App\Bookmark\BookmarkPropertyInterface;

class BookmarkProperty extends \App\Bookmark\BookmarkProperty
{
    public static function createFromLink(string $link): BookmarkPropertyInterface
    {
        if ($link === 'www.such-dummy.com') {
            $bookmarkProperty = new self();

            $bookmarkProperty->title = 'Da bookmark creation';
            $bookmarkProperty->author = 'new author';
            $bookmarkProperty->height = 54;
            $bookmarkProperty->width = 89;

            return $bookmarkProperty;
        }

        if ($link === 'www.such-url-update.com') {
            $bookmarkProperty = new self();

            $bookmarkProperty->title = 'bookmark_1 edited';
            $bookmarkProperty->author = 'Adah edited';
            $bookmarkProperty->height = 25;
            $bookmarkProperty->width = 49;

            return $bookmarkProperty;
        }

        throw new \RuntimeException(sprintf('The fixture for URL %s does not exists', $link));
    }
}
