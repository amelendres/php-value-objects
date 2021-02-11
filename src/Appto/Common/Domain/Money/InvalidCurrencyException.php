<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

class InvalidCurrencyException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct("Invalid currency <$value>");
    }
}
