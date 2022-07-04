<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IProductContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getProducts();
}
