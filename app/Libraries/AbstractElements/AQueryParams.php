<?php

namespace App\Libraries\AbstractElements;

abstract class AQueryParams extends AData
{
    public function __get($name)
    {
        return urlencode(parent::__get($name));
    }
}
