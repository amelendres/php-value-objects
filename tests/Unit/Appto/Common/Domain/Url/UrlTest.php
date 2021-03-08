<?php

namespace Test\Unit\Appto\Common\Domain\Url;

use Appto\Common\Domain\Url\InvalidUrlException;
use Appto\Common\Domain\Url\Url;
use Appto\Common\Infrastructure\PHPUnit\UnitTest;

class UrlTest extends UnitTest
{
    public function testCreateUrlSuccess(): void
    {
        $url = new Url($this->faker->url);
        self::assertNotNull($url->value());
    }

    /**
     * @dataProvider invalidUrlProvider
     */
    public function testCreateUrlFailsWithInvalidUrl($invalidUrl): void
    {
        $this->expectException(InvalidUrlException::class);
        $url = new Url($invalidUrl);
        var_dump($url);
    }

    public function invalidUrlProvider(): array
    {
        return [
            ['www..eu'],
            ['.eu'],
            ['abc'],
            ['www.prueba'],
            ['javascript://%0Aalert(document.cookie)'],
            ['https://yourBankWebsite.com/account?id=<script>alert(document.cookie)</script>'],
            ['>%22%27><img%20src%3d%22javascript:alert(%27XSS%27)%22>'],
            ['<img%20src%3D%26%23x6a;%26%23x61;%26%23x76;%26%23x61;%26%23x73;%26%23x63;%26%23x72;%26%23x69;%26%23x70;%26%23x74;%26%23x3a;alert(%26quot;XSS%26quot;)>'],
            ['%22%2Balert(%27XSS%27)%2B%22'],
            ['<table background="javascript:alert(([code])"></table>'],
            ['<object type=text/html data="javascript:alert(([code]);"></object>'],
            ['<body onload="javascript:alert(([code])"></body>'],
        ];
    }
}
