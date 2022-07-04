<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\SaleOfferReport\OlapDiscountDepartment;

final class OlapDiscountDepartmentAdaptor extends ADataAdaptor
{

    public function createOne(): ?OlapDiscountDepartment
    {
        try {
            return new OlapDiscountDepartment($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
