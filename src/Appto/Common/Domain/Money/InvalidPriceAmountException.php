<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

class InvalidPriceAmountException extends \DomainException
{
    public function __construct(float $value)
    {
        parent::__construct("Invalid price amount <$value>");
    }
}
