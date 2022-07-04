<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IChildModifierContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getChildModifiers();
}
