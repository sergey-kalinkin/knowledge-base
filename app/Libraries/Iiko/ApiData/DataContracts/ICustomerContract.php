<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ICustomerContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCustomers();
}
