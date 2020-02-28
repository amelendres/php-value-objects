<?php

namespace Test\Unit\Appto;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

abstract class UnitTest extends TestCase
{
    /** @var Generator $faker */
    protected $faker;

    protected function setUp(): void
    {
        if(isset($this->faker)){
            return;
        }
        $this->faker = Factory::create();
    }
}
