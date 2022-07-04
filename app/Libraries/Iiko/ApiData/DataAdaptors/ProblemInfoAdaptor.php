<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\Delivery\ProblemInfo;

final class ProblemInfoAdaptor extends ADataAdaptor
{

    public function createOne(): ?ProblemInfo
    {
        try {
            return new ProblemInfo($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
