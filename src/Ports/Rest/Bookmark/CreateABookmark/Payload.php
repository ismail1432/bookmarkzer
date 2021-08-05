<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\CreateABookmark;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

final class Payload
{
    private const SUPPORTED_HOST = [
        'www.flickr.com',
        'www.vimeo.com',
    ];

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Url(
     *     message = "The url '{{ value }}' is not a valid url",
     * )
     */
    public $link;

    /**
     * @var array
     */
    public $tags;

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        $host = parse_url($this->link)['host'] ?? null;

        if (!in_array($host, self::SUPPORTED_HOST)) {
            $context->buildViolation('The link is not supported yet')
                ->atPath('link')
                ->addViolation();
        }
    }
}
