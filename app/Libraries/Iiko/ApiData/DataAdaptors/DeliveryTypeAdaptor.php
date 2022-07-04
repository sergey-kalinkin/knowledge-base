<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader\DeliveryType;

final class DeliveryTypeAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryType
    {
        try {
            return new DeliveryType($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
