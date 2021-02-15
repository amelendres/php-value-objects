<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Criteria;

final class Order
{
    private $orderBy;
    private $orderType;

    public function __construct(string $orderBy, OrderType $orderType)
    {
        $this->orderBy   = $orderBy;
        $this->orderType = $orderType ?: OrderType::asc();
    }

    public static function createDesc(string $orderBy): Order
    {
        return new self($orderBy, OrderType::desc());
    }

    public function orderBy(): string
    {
        return $this->orderBy;
    }

    public function orderType(): OrderType
    {
        return $this->orderType;
    }
}
