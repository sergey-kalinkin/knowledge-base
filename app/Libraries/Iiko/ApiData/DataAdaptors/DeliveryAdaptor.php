<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;

use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\Delivery;

final class DeliveryAdaptor extends ADataAdaptor
{

    public function createOne(): ?Delivery
    {
        try {
            return new Delivery($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }


}
