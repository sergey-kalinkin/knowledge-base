<?php

namespace App\Libraries\Iiko\ApiData\DataContracts;


use App\Libraries\AbstractElements\ADataAdaptor;

interface IDeliveryReportCategoriesContract
{
    /**
     *
     * @return ADataAdaptor
     */
    public function getDelayedDeliveries();

    /**
     *
     * @return ADataAdaptor
     */
    public function getInTimeDeliveries();

    /**
     *
     * @return ADataAdaptor
     */
    public function getStrangeFastDeliveries();
}
