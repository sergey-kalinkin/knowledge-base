<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IImageContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getImages();
}
