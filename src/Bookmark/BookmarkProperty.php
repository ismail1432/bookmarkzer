<?php

namespace App\Bookmark;

use Embed\Embed;

class BookmarkProperty
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $author;

    /**
     * @var int
     */
    public $height;

    /**
     * @var int
     */
    public $width;

    public static function createFromLink(string $link): self
    {
        $bookmarkProperty = new self();
        $extractor = (new Embed())->get($link);

        $bookmarkProperty->title = $extractor->title;
        $bookmarkProperty->author = $extractor->authorName;
        $bookmarkProperty->height = $extractor->code ? $extractor->code->height : null;
        $bookmarkProperty->width = $extractor->code ? $extractor->code->width : null;

        return $bookmarkProperty;
    }
}
