<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ICustomerCardContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCards();
}
