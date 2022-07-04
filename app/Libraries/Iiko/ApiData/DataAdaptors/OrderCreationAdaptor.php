<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\OrderCreationResult;

final class OrderCreationAdaptor extends ADataAdaptor
{

    public function createOne(): ?OrderCreationResult
    {
        try {
            return new OrderCreationResult($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
