<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;

use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryCancelCauseContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getCancelCauses();
}
