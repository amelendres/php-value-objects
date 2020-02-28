<?php

namespace Tests\Unit\Appto\Common\Domain\Identity;


use Test\Unit\Appto\Mother;

class UuidMother extends Mother
{
    public static function random(string $uuidFQNS)
    {
        return new $uuidFQNS(self::$faker->uuid());
    }
}
