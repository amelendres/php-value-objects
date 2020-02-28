<?php

namespace Appto\Common\Domain;

abstract class FloatValueObject
{
    protected $value;

    public function __construct(float $value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    protected abstract function guard(float $value): void;
}
