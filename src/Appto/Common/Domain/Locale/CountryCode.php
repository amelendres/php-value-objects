<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Locale;

use Appto\Common\Domain\StringValueObject;

class CountryCode extends StringValueObject
{
    protected function guard(string $code): void
    {
        if (!$this->isValid($code)) {
            throw new InvalidCountryCodeException($code);
        }
    }

    private function isValid(string $code): bool
    {
        return in_array($code, $this->validCodes());
    }

    private function validCodes(): array
    {
        return ['ES', 'US', 'IT', 'CN'];
    }
}
