<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader\DeliveryHeader;

final class DeliveryHeaderAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryHeader
    {
        try {
            return new DeliveryHeader($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
