<?php

namespace Appto\Common\Domain\Money;

class Price extends Money
{
    public const DEFAULT_CURRENCY = 'EUR';

    public function __construct(float $amount, Currency $currency)
    {
        $this->guardAmount($amount);
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function guardAmount(float $amount): void
    {
        //TODO validate >= 0
    }

}
