<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IOrderTypeContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getOrderType();
}
