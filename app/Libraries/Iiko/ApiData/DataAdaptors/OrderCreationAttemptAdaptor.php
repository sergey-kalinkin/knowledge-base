<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\LogRequest\OrderCreationAttempt;

final class OrderCreationAttemptAdaptor extends ADataAdaptor
{

    public function createOne(): ?OrderCreationAttempt
    {
        try {
            return new OrderCreationAttempt($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
