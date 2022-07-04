<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface ITerminalWorkingHoursContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getWorkingHours();
}
