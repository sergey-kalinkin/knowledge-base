<?php

namespace App\Libraries\AbstractElements;

use Generator;
use Illuminate\Support\Collection;

/**
 * Contract for working with data
 */
interface IEntityDescriptor
{
    /**
     * Return an element represented by entity
     * @return Generator
     */
    public function getYet() : Generator;
}
