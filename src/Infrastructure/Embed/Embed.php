<?php

declare(strict_types=1);

namespace App\Infrastructure\Embed;

use App\Domain\EmbedInterface;
use App\Domain\ValueObject\Link;
use Embed\Embed as OriginalEmbed;

final class Embed implements EmbedInterface
{
    private OriginalEmbed $embed;

    public function get(string $link): Link
    {
        $this->embed = $this->embed ?? new OriginalEmbed();

        $content = $this->embed->get($link);

        return Link::create(
            $content->title,
            $content->authorName,
            $content->code->width,
            $content->code->height,
            100
        );
    }
}
