<?php

namespace Appto\Common\Domain\Money;

class InvalidVATException extends \DomainException
{
    public function __construct(float $value)
    {
        parent::__construct("Invalid VAT <$value>");
    }
}
