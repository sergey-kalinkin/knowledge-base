<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\DeliveryReportHeader;

final class DeliveryReportHeaderAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryReportHeader
    {
        try {
            return new DeliveryReportHeader($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
