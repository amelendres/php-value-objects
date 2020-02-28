<?php

namespace Appto\Common\Domain\Number;

use Appto\Common\Domain\FloatValueObject;

class Percent extends FloatValueObject
{
    protected function guard(float $value) : void
    {
        if($value < 0 || $value > 100){
            throw new InvalidPercentException($value);
        }
    }

}
