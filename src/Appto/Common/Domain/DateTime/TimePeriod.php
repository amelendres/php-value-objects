<?php

declare(strict_types=1);

namespace Appto\Common\Domain\DateTime;

class TimePeriod
{
    private $startDate;
    private $endDate;

    public function __construct(\DateTimeInterface $startDate, \DateTimeInterface $endDate)
    {
        $this->guard($startDate, $endDate);
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    private function guard(\DateTimeInterface $startDate, \DateTimeInterface $endDate): void
    {
        if ($startDate > $endDate) {
            throw new InvalidTimePeriodException($startDate, $endDate);
        }
    }

    public function has(\DateTimeInterface $date): bool
    {
        return $this->startDate <= $date && $date <= $this->endDate;
    }

    public function days(): int
    {
        return $this->endDate()->diff($this->startDate())->days + 1;
    }

    public function startDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function endDate(): \DateTimeInterface
    {
        return $this->endDate;
    }
}
