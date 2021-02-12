<?php

declare(strict_types=1);

namespace Appto\Common\Domain;

interface Nullable
{
    public function isNull(): bool;
}
