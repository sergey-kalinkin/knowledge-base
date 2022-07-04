<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IPaymentTypeContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getPaymentType();
}
