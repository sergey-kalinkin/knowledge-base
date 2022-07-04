<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IPreparationSnapshotContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getSnapshot();
}
