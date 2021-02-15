<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

use Appto\Common\Domain\FloatValueObject;

class VAT extends FloatValueObject
{
    protected function guard(float $value): void
    {
        if ($this->value < 0 || $this->value > 1) {
            throw new InvalidVATException($value);
        }
    }
}
