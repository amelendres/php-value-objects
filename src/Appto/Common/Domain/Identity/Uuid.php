<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Identity;

use Appto\Common\Domain\StringValueObject;

class Uuid extends StringValueObject
{
    protected $value;

    protected function guard(string $value): void
    {
        if (!\Ramsey\Uuid\Uuid::isValid($value)) {
            throw new InvalidUuidException($value);
        }
    }
}
