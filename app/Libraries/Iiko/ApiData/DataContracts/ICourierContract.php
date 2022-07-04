<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ICourierContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCouriers();
}
