<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\Product;

final class ProductAdaptor extends ADataAdaptor
{

    public function createOne(): ?Product
    {
        try {
            return new Product($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
