<?php

namespace Test\Unit\Appto\Common\Domain\Locale;

use Appto\Common\Domain\Locale\CountryCode;
use Appto\Common\Domain\Locale\InvalidCountryCodeException;
use Test\Unit\Appto\UnitTest;

class CountryCodeTest extends UnitTest
{
    /**
     * @dataProvider validCountryCodesProvider
     */
    public function testCreateWithValidCountryCode($code)
    {
        $countryCode = new CountryCode($code);

        $this->assertNotNull($countryCode);
    }
    /**
     * @dataProvider invalidCountryCodesProvider
     */
    public function testCreateFailWithInvalidCountryCode($code)
    {
        $this->expectException(InvalidCountryCodeException::class);

        $countryCode = new CountryCode($code);

        $this->assertNotNull($countryCode);
    }

    public function validCountryCodesProvider()
    {
        return [['ES', 'US', 'IT', 'CN']];
    }

    public function invalidCountryCodesProvider()
    {
        return [[ '', 'de', '--', '$$', 'xx', '**', '__', '@@']];
    }
}
