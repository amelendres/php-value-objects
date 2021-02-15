<?php

declare(strict_types=1);

namespace Appto\Common\Infrastructure\PHPUnit;

use Faker\Factory;
use Faker\Generator;

abstract class Mother
{
    protected static $faker;

    public static function faker(): Generator
    {
        if (!self::$faker) {
            self::$faker = Factory::create();
        }

        return self::$faker;
    }
}
