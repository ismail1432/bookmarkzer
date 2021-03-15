<?php

namespace App\Serializer;

use App\Entity\Bookmark;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class BookmarkNormalizer implements ContextAwareNormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }


    public function normalize($object, string $format = null, array $context = [])
    {
        $data = $this->normalizer->normalize($object, $format, $context);

        $data['@id'] = '/bookmarks/'.$object->getUuid();

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = [])
    {
       return $data instanceof Bookmark;
    }
}