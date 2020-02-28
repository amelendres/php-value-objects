<?php

namespace Appto\Common\Domain\Money;

class Money
{
    protected $amount;
    protected $currency;

    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $other) : bool
    {
        return $this->currency->equals($other->currency())
            && $this->amount == $other->amount;
    }

    public function amount() : float
    {
        return $this->amount;
    }

    public function currency() : Currency
    {
        return $this->currency;
    }
}
