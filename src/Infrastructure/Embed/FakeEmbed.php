<?php

namespace App\Infrastructure\Embed;

use App\Domain\EmbedInterface;
use App\Domain\ValueObject\Link;

class FakeEmbed implements EmbedInterface
{
    private const LINK_FIXTURE = [
        'www.flickr.com/1234' => [
            'title' => 'bookmark_1 edited',
            'author' => 'Adah edited',
            'url' => 'www.such-url-update.com',
            'height' => 25,
            'width' => 49,
            'duration' => 180,
        ],

        'www.vimeo.com/4321' => [
            'title' => 'Da bookmark creation',
            'author' => 'new author',
            'url' => 'www.such-dummy.com',
            'height' => 54,
            'width' => 89,
            'duration' => 720,
            'type' => 'video',
        ],
    ];

    public function get(string $link): Link
    {
        $content = self::LINK_FIXTURE[$link] ?? null;

        if (null === $content) {
            throw new \RuntimeException(sprintf('There is no fixture for url: %s', $link));
        }

        return Link::create(
            $content['title'],
            $content['authorName'],
            $content['width'],
            $content['height'],
            $content['duration'],
        );
    }
}
