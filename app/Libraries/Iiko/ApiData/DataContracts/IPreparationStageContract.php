<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IPreparationStageContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getStage();
}
