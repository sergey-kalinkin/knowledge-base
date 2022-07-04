<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;

use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\OrderLocationInfo;

final class OrderLocationInfoAdaptor extends ADataAdaptor
{

    public function createOne(): ?OrderLocationInfo
    {
        try {
            return new OrderLocationInfo($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
