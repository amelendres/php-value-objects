<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

use Appto\Common\Domain\StringValueObject;
use Symfony\Component\Intl\Currencies;

class Currency extends StringValueObject
{

    protected function guard(string $value) : void
    {
        if (!Currencies::exists($value)) {
            throw new InvalidCurrencyException($value);
        }
    }
}
