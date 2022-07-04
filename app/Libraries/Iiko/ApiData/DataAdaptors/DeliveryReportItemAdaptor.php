<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\DeliveryReportItem;

final class DeliveryReportItemAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryReportItem
    {
        try {
            return new DeliveryReportItem($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
