<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Money;

class Price
{
    private $amount;
    private $vat;

    public function __construct(Money $amount, VAT $vat)
    {
        $this->guardAmount($amount);
        $this->amount = $amount;
        $this->vat = $vat;
    }

    public function guardAmount(Money $amount) : void
    {
        if ($this->amount()->amount() < 0) {
            throw new InvalidPriceAmountException($amount->amount());
        }
    }

    public function amount() : Money
    {
        return $this->amount;
    }

    public function vat() : VAT
    {
        return $this->vat;
    }
}
