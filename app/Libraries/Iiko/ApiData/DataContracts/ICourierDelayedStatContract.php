<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ICourierDelayedStatContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCourierStatus();
}
