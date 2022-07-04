<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\CommentsAboutUser\EmployeeDescription;

final class EmployeeDescriptionAdaptor extends ADataAdaptor
{

    public function createOne(): ?EmployeeDescription
    {
        try {
            return new EmployeeDescription($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
