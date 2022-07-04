<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\ResponsiblePerson;

final class ResponsiblePersonAdaptor extends ADataAdaptor
{

    public function createOne(): ?ResponsiblePerson
    {
        try {
            return new ResponsiblePerson($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
