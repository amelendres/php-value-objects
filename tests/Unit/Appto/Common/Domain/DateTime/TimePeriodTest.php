<?php

declare(strict_types=1);

namespace Test\Unit\Appto\Common\Domain\DateTime;

use Appto\Common\Domain\DateTime\InvalidTimePeriodException;
use Appto\Common\Domain\DateTime\TimePeriod;
use Appto\Common\Infrastructure\PHPUnit\UnitTest;

class TimePeriodTest extends UnitTest
{
    public function testCreated()
    {
        $timePeriod = new TimePeriod(
            $this->faker->dateTimeAd('now'),
            new \DateTime()
        );
        self::assertNotNull($timePeriod);
    }

    public function testCreatedFailWithInvalidEndDate()
    {
        $this->expectException(InvalidTimePeriodException::class);
        $timePeriod = new TimePeriod(
            new \DateTime(),
            $this->faker->dateTimeAd('now')
        );
    }

    public function testCountDays()
    {
        $timePeriod = new TimePeriod(
            new \DateTime("2018/01/01"),
            new \DateTime("2018/01/10")
        );
        self::assertEquals(10, $timePeriod->days());
    }

    public function testHasDateAsStartDate()
    {
        $timePeriod = new TimePeriod(
            new \DateTime("2018/01/01"),
            new \DateTime("2018/01/10")
        );
        self::assertTrue( $timePeriod->has(new \DateTime("2018/01/01")));
    }

    public function testHasDateAsEndDate()
    {
        $timePeriod = new TimePeriod(
            new \DateTime("2018/01/01"),
            new \DateTime("2018/01/10")
        );
        self::assertTrue( $timePeriod->has(new \DateTime("2018/01/10")));
    }

    public function testDoesNotHasDate()
    {
        $timePeriod = new TimePeriod(
            new \DateTime("2018/01/01"),
            new \DateTime("2018/01/10")
        );
        self::assertFalse( $timePeriod->has(new \DateTime("2018/01/11")));
    }
}
