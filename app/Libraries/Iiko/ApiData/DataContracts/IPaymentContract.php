<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IPaymentContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getPayments();
}
