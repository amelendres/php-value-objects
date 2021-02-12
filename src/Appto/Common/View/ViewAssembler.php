<?php

declare(strict_types=1);

namespace Appto\Common\View;

interface ViewAssembler
{
    public function assemble($object): View;
}
