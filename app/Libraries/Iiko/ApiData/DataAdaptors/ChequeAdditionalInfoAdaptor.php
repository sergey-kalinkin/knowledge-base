<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\ChequeAdditionalInfo;

final class ChequeAdditionalInfoAdaptor extends ADataAdaptor
{

    public function createOne(): ?ChequeAdditionalInfo
    {
        try {
            return new ChequeAdditionalInfo($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
