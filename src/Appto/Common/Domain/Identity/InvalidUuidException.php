<?php

namespace Appto\Common\Domain\Identity;


class InvalidUuidException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct("Invalid Uuid <$value>");
    }
}
