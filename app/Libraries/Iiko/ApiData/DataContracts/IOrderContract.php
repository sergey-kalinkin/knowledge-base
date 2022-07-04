<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IOrderContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getOrders();
}
