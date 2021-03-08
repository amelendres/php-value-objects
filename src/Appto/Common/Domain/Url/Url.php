<?php

declare(strict_types=1);

namespace Appto\Common\Domain\Url;

use Appto\Common\Domain\Nullable;
use Appto\Common\Domain\StringValueObject;

class Url extends StringValueObject implements Nullable
{
    protected function guard(string $url): void
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (substr($url, 0, 4) != 'http' || filter_var($url, FILTER_SANITIZE_STRING) != $url) {
            throw new InvalidUrlException($url);
        }
    }

    public function isNull(): bool
    {
        return null == $this->value;
    }
}
