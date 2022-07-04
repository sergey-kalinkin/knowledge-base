<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IOperatorContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getOperators();
}
