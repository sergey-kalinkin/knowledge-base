<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IAddressContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getAddresses();
}
