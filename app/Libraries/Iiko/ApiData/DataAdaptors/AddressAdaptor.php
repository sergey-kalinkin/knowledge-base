<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;

use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\Address;

final class AddressAdaptor extends ADataAdaptor
{

    public function createOne(): ?Address
    {
        try {
            return new Address($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
