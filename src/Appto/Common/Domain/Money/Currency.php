<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

use Appto\Common\Domain\StringValueObject;

class Currency extends StringValueObject
{

    protected function guard(string $code): void
    {
        if (!$this->isValid($code)) {
            throw new InvalidCurrencyException($code);
        }
    }

    private function isValid(string $currency): bool
    {
        return $currency === "EUR";
    }
}
