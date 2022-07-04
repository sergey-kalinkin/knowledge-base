<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\CourierDelayedStat;

final class CourierDelayedStatAdaptor extends ADataAdaptor
{

    public function createOne(): ?CourierDelayedStat
    {
        try {
            return new CourierDelayedStat($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
