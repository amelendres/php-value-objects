<?php

declare(strict_types=1);

namespace Appto\Common\Domain\DateTime;

class InvalidTimePeriodException extends \DomainException
{
    public function __construct(\DateTimeInterface $startDate, \DateTimeInterface $endDate)
    {
        parent::__construct(
            "Invalid time period,
             endDate <{$endDate->format('d-m-Y')}> must be after the startDate <{$startDate->format('d-m-Y')}>"
        );
    }
}
