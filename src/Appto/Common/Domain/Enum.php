<?php

declare(strict_types=1);

namespace Appto\Common\Domain;

use ReflectionClass;

abstract class Enum extends StringValueObject
{
    protected static $cache = [];

    abstract protected function throwExceptionForInvalidValue($value);

    public static function __callStatic(string $name, $args)
    {
        /** @phpstan-ignore-next-line */
        return new static($name);
    }

    public static function values(): array
    {
        $class = static::class;

        if (!isset(self::$cache[$class])) {
            $reflected           = new ReflectionClass($class);
            self::$cache[$class] = $reflected->getConstants();
        }

        return self::$cache[$class];
    }

    protected function guard($value): void
    {
        if (!\in_array($value, static::values(), true)) {
            $this->throwExceptionForInvalidValue($value);
        }
    }
}
