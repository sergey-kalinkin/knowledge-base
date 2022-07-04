<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IClientAddressContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getAddresses();
}
