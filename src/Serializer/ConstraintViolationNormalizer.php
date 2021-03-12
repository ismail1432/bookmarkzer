<?php

namespace App\Serializer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ConstraintViolationNormalizer implements DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function denormalize($data, $type, $format = null, array $context = [])
    {
        dump($data);die;
        return $data;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return ConstraintViolationListInterface::class === $type;
    }
}