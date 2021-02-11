<?php

declare(strict_types=1);

namespace Appto\Common\Infrastructure\PHPUnit\Mother;

use Appto\Common\Infrastructure\PHPUnit\Mother;

final class UuidMother extends Mother
{
    public static function random(string $uuidFQNS)
    {
        return new $uuidFQNS(self::faker()->uuid);
    }
}
