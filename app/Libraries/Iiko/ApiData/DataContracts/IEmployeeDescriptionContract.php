<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IEmployeeDescriptionContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getEmployeeDescriptions();
}
