<?php

namespace Appto\Common\Domain\Number;

class InvalidPercentException extends \DomainException
{
    public function __construct(float $value)
    {
        parent::__construct("Invalid Percent <$value>, It must be between 0..100");
    }
}
