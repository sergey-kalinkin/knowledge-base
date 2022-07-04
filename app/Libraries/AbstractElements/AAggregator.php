<?php

namespace App\Libraries\AbstractElements;

abstract class AAggregator
{
    /**
     * raw array data
     * @var array
     */
    protected $data;

    /**
     * Return all object data
     * @return array
     */
    public function getRawData() : array
    {
        return $this->data;
    }
}
