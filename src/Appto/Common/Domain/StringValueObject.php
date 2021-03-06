<?php

declare(strict_types=1);

namespace Appto\Common\Domain;

abstract class StringValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    abstract protected function guard(string $value): void;

    public function value(): string
    {
        return $this->value;
    }

    /**
     * @deprecated use toString
     */
    public function __toString(): string
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value == $other->value;
    }
}
