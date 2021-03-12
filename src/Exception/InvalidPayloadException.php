<?php

namespace App\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class InvalidPayloadException extends \RuntimeException
{
    private $constraintViolationList;

    public function __construct(ConstraintViolationListInterface $constraintViolationList, string $message = '', int $code = 0, \Exception $previous = null)
    {
        $this->constraintViolationList = $constraintViolationList;

        parent::__construct($message ?: $this->__toString(), $code, $previous);
    }

    public function getConstraintViolationList(): ConstraintViolationListInterface
    {
        return $this->constraintViolationList;
    }
}