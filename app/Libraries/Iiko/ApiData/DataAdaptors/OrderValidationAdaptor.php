<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\OrderValidationResult;

final class OrderValidationAdaptor extends ADataAdaptor
{

    public function createOne(): ?OrderValidationResult
    {
        try {
            return new OrderValidationResult($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
