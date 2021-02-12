<?php

declare(strict_types=1);

namespace Appto\Common\Infrastructure\PHPUnit\Mother;

use Appto\Common\Infrastructure\PHPUnit\Mother;

class SimpleVOMother extends Mother
{
    public static function random(string $FQNS, $args)
    {
        return new $FQNS($args);
    }
}
