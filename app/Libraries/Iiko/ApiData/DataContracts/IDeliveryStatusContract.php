<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryStatusContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getDeliveryStatuses();
}
