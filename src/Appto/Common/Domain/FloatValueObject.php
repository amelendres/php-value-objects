<?php

declare(strict_types=1);

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

    public function equals(self $other): bool
    {
        return $this->value == $other->value;
    }

    abstract protected function guard(float $value): void;
}
