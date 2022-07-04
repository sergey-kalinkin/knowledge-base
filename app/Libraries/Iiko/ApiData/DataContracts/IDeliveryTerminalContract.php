<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryTerminalContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getDeliveryTerminals();
}
