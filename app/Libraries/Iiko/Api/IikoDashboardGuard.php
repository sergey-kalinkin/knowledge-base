<?php

namespace App\Libraries\Iiko\Api;


use App\Libraries\AbstractElements\AComposite;
use App\Libraries\Iiko\ApiData\QueryBody\ClientComment\ClientIdBodyCommentParams;
use App\Libraries\Iiko\ApiData\QueryBody\ClientProfile\ClientIdBodyProfileParams;
use App\Libraries\Iiko\ApiData\QueryBody\DeliveryReport\DeliveryBodyParams;
use App\Libraries\Iiko\ApiData\QueryParams\ClientIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\Date;
use App\Libraries\Iiko\ApiData\QueryParams\DateRange;
use App\Libraries\Iiko\ApiData\QueryParams\IikoId;
use App\Libraries\Iiko\ApiData\QueryParams\SaleOfferReportParams;
use App\Libraries\Iiko\ApiData\QueryParams\StreetClassifierIdParams;
use App\Libraries\Iiko\ApiData\IikoData;

class IikoDashboardGuard
{
    /**
     * @var IikoDashboardApi
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoDashboardApi();
    }

    /**
     * Fetch reports of delayed deliveries
     * @param DeliveryBodyParams $params
     * @return mixed|null
     */
    public function getDeliveryReportList(DeliveryBodyParams $params) : AComposite
    {
        $deliveries = $this->api->getDeliveryReportList($params->getBody());
        return new IikoData($deliveries ?? []);
    }

    /**
     * Fetch a report of delayed delivery with delivery info
     * @param IikoId $params
     * @return mixed|null
     */
    public function getDetailedDeliveryReportById(IikoId $params) : AComposite
    {
        $delivery = $this->api->getDetailedDeliveryReportById($params->id);
        return new IikoData($delivery ?? []);
    }

    /**
     * Suppose it update something
     * @param Date $params
     * @return bool
     */
    public function getDeliveriesByDate(Date $params): bool
    {
        $is_ok = $this->api->getDeliveriesByDate($params->date);
        return $is_ok === true;
    }

    /**
     * Suppose it update something
     * @param DateRange $params
     * @return bool
     */
    public function getDeliveriesByDateRange(DateRange $params): bool
    {
        $is_ok = $this->api->getDeliveriesByDate($params->date_from, $params->date_to);
        return $is_ok === true;
    }

    /**
     * Suppose it update something
     * @param IikoId $params
     * @return bool
     */
    public function getDeliveryById(IikoId $params): bool
    {
        $is_ok = $this->api->getDeliveryById($params->id);
        return $is_ok === true;
    }
}
