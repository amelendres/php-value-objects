<?php

declare(strict_types=1);

namespace Appto\Common\Infrastructure\PHPUnit\Mother;

use Appto\Common\Infrastructure\PHPUnit\Mother;

class SimpleValueObjectMother extends Mother
{
    public static function random(Callable $objectMother)
    {
        return call_user_func($objectMother);
    }
}
