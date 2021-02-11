<?php

declare(strict_types=1);

namespace Test\Unit\Appto\Common\Domain\DateTime;

use Appto\Common\Domain\DateTime\DateTime;
use Appto\Common\Domain\DateTime\InvalidStringDateTimeException;
use Appto\Common\Infrastructure\PHPUnit\UnitTest;

class DatetimeTest extends UnitTest
{
    public function testConvertsBackAndForth()
    {
        $string = '2014-03-12T14:17:19.176169+00:00';
        $dateTime = DateTime::fromString($string);

        $this->assertEquals($string, $dateTime->toString());
    }

    /**
     * @dataProvider provideInvalidDates
     */
    public function testFailsConvertsBackAndForth(string $invalidDate)
    {
        $this->expectException(InvalidStringDateTimeException::class);
        DateTime::fromString($invalidDate);
    }

    public function testCreatesNow()
    {
        $this->assertInstanceOf(Datetime::class, DateTime::now());
    }

    /**
     * @dataProvider provideDatesAndIntervals
     */
    public function testAddsIntervals($dateTime, $interval, $expectedDateTime)
    {
        $dateTime = DateTime::fromString($dateTime)->add($interval);

        $this->assertEquals($expectedDateTime, $dateTime->toString());
    }

    /**
     * @dataProvider provideDatesAndIntervals
     */
    public function testSubtractsIntervals($expectedDateTime, $interval, $dateTime)
    {
        $dateTime = DateTime::fromString($dateTime)->sub($interval);

        $this->assertEquals($expectedDateTime, $dateTime->toString());
    }

    public function testReturnsANewInstanceWhenAddingInterval()
    {
        $dateTime = DateTime::fromString('2015-03-14T00:00:00.000000+00:00');
        $newDateTime = $dateTime->add('PT0S');

        $this->assertNotSame($newDateTime, $dateTime);
    }

    /**
     * @dataProvider provideDateDiffs
     */
    public function testDiffsTwoDates(string $dateTime, string $otherDateTime, array $expectedDiff)
    {
        $diff = DateTime::fromString($dateTime)->diff(DateTime::fromString($otherDateTime));

        $this->assertEquals($expectedDiff['ymdhis'], $diff->format('%y%m%d%h%i%s'));
        $this->assertEquals($expectedDiff['days'], $diff->days, '"days" is incorrect');
        $this->assertEquals($expectedDiff['invert'], $diff->invert, '"invert" is incorrect');
    }

    public function testComparesTwoDates()
    {
        $this->assertTrue(DateTime::fromString('2014-01-01T01:01:01.123456+0000')->equals(DateTime::fromString('2014-01-01T01:01:01.123456+0000')));  // exact the same
        $this->assertTrue(DateTime::fromString('2014-01-01T01:01:01.123456+02:00')->equals(DateTime::fromString('2014-01-01T01:01:01.123456+0200'))); // different TimeZone format
        $this->assertTrue(DateTime::fromString('2014-01-01T13:37:42.000000+0000')->equals(DateTime::fromString('2014-01-01T13:37:42+0000')));         // with and without milliseconds
    }

    /**
     * @dataProvider provideGreaterThanDates
     */
    public function testReturnsIfADateIsGreaterThanAnotherDate(string $dateTime, string $otherDateTime, bool $bool)
    {
        $this->assertSame($bool, DateTime::fromString($dateTime)->greaterThan(DateTime::fromString($otherDateTime)));
    }

    public function testReturnsTheNativeDatetimeObject()
    {
        $this->assertInstanceOf(\DateTimeImmutable::class, DateTime::now()->toNative());
    }

    /**
     * @dataProvider provideLowerThanDates
     */
    public function testIfADateIsLowerThanAnotherDate(string $lower, string $greater, bool $isLower)
    {
        $lowerDate = DateTime::fromString($lower);
        $greaterDate = DateTime::fromString($greater);

        $this->assertSame($isLower, $lowerDate->lowerThan($greaterDate));
    }

    public function provideDatesAndIntervals()
    {
        return [
            ['2015-03-14T00:00:00.000000+00:00', 'P6W',            '2015-04-25T00:00:00.000000+00:00'],
            ['2000-01-01T00:00:00.000000+00:00', 'P7Y5M4DT4H3M2S', '2007-06-05T04:03:02.000000+00:00'],
        ];
    }

    public function provideDateDiffs()
    {
        return [
            ['2014-04-22T13:37:42.123456+02:00', '2014-04-23T13:37:42.123456+02:00', ['ymdhis' => '001000', 'days' => 1,  'invert' => 0]],
            ['2014-04-22T13:37:42.123456+02:00', '2014-05-24T13:37:42.123456+02:00', ['ymdhis' => '012000', 'days' => 32, 'invert' => 0]],
            ['2014-04-22T13:37:42.123456+00:00', '2014-04-22T13:37:42.123456+02:00', ['ymdhis' => '000200', 'days' => 0,  'invert' => 1]],
        ];
    }

    public function provideGreaterThanDates()
    {
        return [
            ['2014-05-01T12:00:00.000000+00:00', '2014-05-01T12:00:00.000000+00:00', false], // equal
            ['2014-04-22T13:37:42.123456+02:00', '2014-04-22T13:37:42.123456+00:00', false], // timezone
            ['2014-04-22T13:37:42.123456+00:00', '2014-04-22T12:37:42.123456+00:00', true],  // time
            ['2014-04-21T13:37:42.123456+00:00', '2014-04-22T13:37:42.123456+00:00', false],  // date
        ];
    }

    public function provideLowerThanDates()
    {
        return [
            ['2020-05-01T12:00:00','2020-05-01T12:00:01', true],
            ['2020-05-01T12:00:01.000000+00:00','2020-05-01T12:00:00.000000+00:00', false],
            ['2020-05-01T12:00:00.000000+00:00','2020-05-01T12:00:00.000000+00:00', false],
            ['2020-05-01 12:00:00','2020-05-01T12:00:00.000001+00:00', true]
        ];
    }

    public function provideInvalidDates()
    {
        return [
            ['string name'],
            ['']
    ];
    }
}