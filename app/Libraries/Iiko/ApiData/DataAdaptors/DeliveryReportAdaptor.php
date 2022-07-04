<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\DeliveryReport;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\ResponsiblePerson;

final class DeliveryReportAdaptor extends ADataAdaptor
{

    public function createOne(): ?DeliveryReport
    {
        try {
            return new DeliveryReport($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
