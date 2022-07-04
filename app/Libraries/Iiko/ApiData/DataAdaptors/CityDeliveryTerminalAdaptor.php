<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryTerminal\CityDeliveryTerminal;

final class CityDeliveryTerminalAdaptor extends ADataAdaptor
{

    public function createOne(): ?CityDeliveryTerminal
    {
        try {
            return new CityDeliveryTerminal($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
