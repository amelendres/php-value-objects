<?php

declare(strict_types=1);

namespace Appto\Common\Domain\DateTime;

class InvalidStringDateTimeException extends \DomainException
{
    public function __construct(string $dateTime)
    {
        parent::__construct(sprintf('Invalid date time <%s>', $dateTime));
    }
}
