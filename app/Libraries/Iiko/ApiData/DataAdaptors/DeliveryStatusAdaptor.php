<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader\DeliveryStatus;

final class DeliveryStatusAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryStatus
    {
        try {
            return new DeliveryStatus($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
