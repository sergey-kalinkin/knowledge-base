<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\SaleOfferReport\SaleOfferReport;

final class SaleOfferReportAdaptor extends ADataAdaptor
{
    public function createOne(): ?SaleOfferReport
    {
        try {
            return new SaleOfferReport($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
