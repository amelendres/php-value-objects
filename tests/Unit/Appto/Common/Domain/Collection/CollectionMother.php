<?php

namespace Tests\Unit\Appto\Common\Domain\Collection;

use Test\Unit\Appto\Mother;

class CollectionMother extends Mother
{
    public static function elements(Callable $objectMother, int $count=3)
    {
        $elements = [];
        $i = 0;
        while ($i < $count) {
            $elements[] = call_user_func($objectMother);
            $i++;
        }

        return $elements;
    }

    public static function randomFor(string $collectionFQNS, Callable $objectMother, int $count=10)
    {
        return new $collectionFQNS(self::elements($objectMother, $count));
    }
}
