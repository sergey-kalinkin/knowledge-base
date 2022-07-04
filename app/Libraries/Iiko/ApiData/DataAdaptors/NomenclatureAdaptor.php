<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Nomenclature\Nomenclature;

final class NomenclatureAdaptor extends ADataAdaptor
{

    public function createOne(): ?Nomenclature
    {
        try {
            return new Nomenclature($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
