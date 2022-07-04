<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IOlapDiscountDepartmentContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getDiscountDepartmentList();
}
