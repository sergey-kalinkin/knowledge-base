<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;

use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\ComboInformation;

final class ComboInfoAdaptor extends ADataAdaptor
{

    public function createOne(): ?ComboInformation
    {
        try {
            return new ComboInformation($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
