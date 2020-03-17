<?php

namespace Appto\Common\Domain\Locale;


class InvalidCountryCodeException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct("Invalid country code <$value>");
    }
}
