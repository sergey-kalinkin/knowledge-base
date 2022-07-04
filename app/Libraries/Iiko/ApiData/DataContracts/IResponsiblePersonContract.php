<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IResponsiblePersonContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getResponsible();
}
