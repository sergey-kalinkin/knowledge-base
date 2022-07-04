<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\IikoCard\IikoTransactionType;

final class IikoTransactionTypeAdaptor extends ADataAdaptor
{

    public function createOne(): ?IikoTransactionType
    {
        try {
            return new IikoTransactionType($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
