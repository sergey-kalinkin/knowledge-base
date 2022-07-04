<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryTypeContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getDeliveryTypes();
}
