<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Order\OrderDelivery;

final class OrderDeliveryAdaptor extends ADataAdaptor
{

    public function createOne(): ?OrderDelivery
    {
        try {
            return new OrderDelivery($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
