<?php

declare(strict_types=1);

namespace Test\Unit\Appto\Common\Domain\Identity;

use Appto\Common\Domain\Identity\Uuid;
use Appto\Common\Infrastructure\PHPUnit\Mother\UuidMother;
use Appto\Common\Infrastructure\PHPUnit\UnitTest;

class UuidTest extends UnitTest
{
    public function testCreateUuidSuccess() : void
    {
        $uuid = UuidMother::random(Uuid::class);
        self::assertNotNull($uuid);
    }
}
