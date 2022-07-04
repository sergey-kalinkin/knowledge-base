<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IStopListItemContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getStopListItems();
}
