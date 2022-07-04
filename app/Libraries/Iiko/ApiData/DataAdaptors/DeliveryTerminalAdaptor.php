<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\DeliveryTerminal;

final class DeliveryTerminalAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryTerminal
    {
        try {
            return new DeliveryTerminal($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
