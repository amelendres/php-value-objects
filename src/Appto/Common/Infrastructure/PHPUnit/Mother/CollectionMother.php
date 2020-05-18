<?php

namespace Appto\Common\Infrastructure\PHPUnit\Mother;

use Appto\Common\Infrastructure\PHPUnit\Mother;

class CollectionMother extends Mother
{
    public static function elements(callable $objectMother, $args, int $count = 3)
    {
        $elements = [];
        $i = 0;
        while ($i < $count) {
            $elements[] = call_user_func($objectMother, $args);
            $i++;
        }

        return $elements;
    }

    public static function randomFor(string $collectionFQNS, callable $objectMother, int $count = 10)
    {
        return new $collectionFQNS(self::elements($objectMother, null, $count));
    }
}
