<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Nomenclature\DifferentPriceInfo;

final class DifferentPriceInfoAdaptor extends ADataAdaptor
{

    public function createOne(): ?DifferentPriceInfo
    {
        try {
            return new DifferentPriceInfo($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
