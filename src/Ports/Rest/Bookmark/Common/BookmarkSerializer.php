<?php

declare(strict_types=1);

namespace App\Ports\Rest\Bookmark\Common;

use App\Domain\Model\Bookmark;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Serializer\Encoder\NormalizationAwareInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class BookmarkSerializer implements ContextAwareNormalizerInterface
{
    private $router;
    private $normalizer;

    public function __construct(UrlGeneratorInterface $router, ObjectNormalizer $normalizer)
    {
        $this->router = $router;
        $this->normalizer = $normalizer;
    }

    public function normalize($bookmark, string $format = null, array $context = [])
    {
        /** @var Bookmark $bookmark */
        $data = $this->normalizer->normalize($bookmark, $format, $context);

        $data['href']['self'] = $this->router->generate('bookmark_read', [
            'id' => $bookmark->getId(),
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof BookmarkOutput;
    }
}