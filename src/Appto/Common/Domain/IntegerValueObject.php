<?php

namespace Appto\Common\Domain;

abstract class IntegerValueObject
{
    protected $value;

    public function __construct(int $value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    protected abstract function guard(int $value): void;
}
