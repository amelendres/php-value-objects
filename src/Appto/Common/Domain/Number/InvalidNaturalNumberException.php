<?php


namespace Appto\Common\Domain\Number;


class InvalidNaturalNumberException extends \DomainException
{
    public function __construct(int $value)
    {
        parent::__construct("Invalid Natural Number <$value>");
    }
}
