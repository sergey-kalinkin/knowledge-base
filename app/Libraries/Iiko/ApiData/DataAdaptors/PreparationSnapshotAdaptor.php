<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\PreparationSnapshot;

final class PreparationSnapshotAdaptor extends ADataAdaptor
{

    public function createOne(): ?PreparationSnapshot
    {
        try {
            return new PreparationSnapshot($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
