<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ICityContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCities();
}
