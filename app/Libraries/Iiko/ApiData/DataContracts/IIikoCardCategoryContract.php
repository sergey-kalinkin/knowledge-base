<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IIikoCardCategoryContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getIikoCardCategories();
}
