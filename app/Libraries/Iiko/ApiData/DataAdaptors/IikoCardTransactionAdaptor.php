<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\IikoCard\IikoCardTransaction;

final class IikoCardTransactionAdaptor extends ADataAdaptor
{

    public function createOne(): ?IikoCardTransaction
    {
        try {
            return new IikoCardTransaction($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
