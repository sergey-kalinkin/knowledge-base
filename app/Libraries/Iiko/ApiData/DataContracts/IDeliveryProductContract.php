<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryProductContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getModifiers();
}
