<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IIkoTransactionTypeContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getTransactionTypes();
}
