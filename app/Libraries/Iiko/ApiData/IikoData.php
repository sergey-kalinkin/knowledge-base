<?php

namespace App\Libraries\Iiko\ApiData;

use App\Libraries\AbstractElements\AComposite;
use Generator;

class IikoData extends AComposite
{
    /**
     * @var bool is data assoc array
     */
    private $isAssoc;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->isAssoc = $this->isAssoc();
    }

    /**
     * @inheritDoc
     */
    public function getYet() : Generator
    {
        if($this->isAssoc)
            yield $this->data;
        else
            yield from parent::getYet();
    }

    /**
     * Check if an array is associate array by first key
     *
     * CAUTION method change behaviour of array
     *
     * @return bool
     */
    private function isAssoc() : bool
    {
        reset($this->data);
        $key = key($this->data);

        return is_string($key);
    }
}
