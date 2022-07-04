<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface INomenclatureChildContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getChildren();
}
