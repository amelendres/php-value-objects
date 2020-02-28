<?php

namespace Tests\Unit\Appto\Common\Domain;


use Test\Unit\Appto\Mother;

class SimpleValueObjectMother extends Mother
{
    public static function random(Callable $objectMother)
    {
        return call_user_func($objectMother);
    }
}
