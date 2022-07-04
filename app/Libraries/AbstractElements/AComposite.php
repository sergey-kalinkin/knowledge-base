<?php

namespace App\Libraries\AbstractElements;


use Generator;

/**
 * Class represent composite data element
 */
class AComposite extends AAggregator implements IEntityDescriptor
{
    /**
     * @inheritDoc
     */
    public function getYet() : Generator
    {
        foreach ($this->data as $item) {
            yield $item;
        }
    }
}
