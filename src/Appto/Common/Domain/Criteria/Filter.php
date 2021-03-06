<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Criteria;

class Filter
{
    private $name;
    private $operator;
    private $value;

    public function __construct(string $name, string $operator, string $value)
    {
        $this->name = $name;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function operator(): string
    {
        return $this->operator;
    }

    public function value(): string
    {
        return $this->value;
    }
}
