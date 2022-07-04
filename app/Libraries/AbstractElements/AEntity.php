<?php

namespace App\Libraries\AbstractElements;


abstract class AEntity extends AElement
{
    /**
     * init data model
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
