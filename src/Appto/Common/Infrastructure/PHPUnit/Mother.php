<?php

namespace Appto\Common\Infrastructure\PHPUnit;

use Faker\Factory;
use Faker\Generator;

abstract class Mother
{
    protected static $faker;

    public static function faker(): Generator
    {
        return self::$faker ? self::$faker : self::$faker = Factory::create() ;
    }
}
