<?php

namespace App\Libraries\Iiko\Api;




use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryReportAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderDeliveryAdaptor;
use App\Libraries\Iiko\ApiData\QueryBody\DeliveryReport\DeliveryBodyParams;
use App\Libraries\Iiko\ApiData\QueryParams\Date;
use App\Libraries\Iiko\ApiData\QueryParams\DateRange;
use App\Libraries\Iiko\ApiData\QueryParams\IikoId;
use Illuminate\Validation\ValidationException;

class IikoDashboard
{
    /**
     * @var IikoDashboardGuard
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoDashboardGuard();
    }

    /**
     * Fetch reports of delayed deliveries
     * @param array $params
     * @return DeliveryReportAdaptor
     *
     * @throws ValidationException
     */
    public function getDeliveryReportList(array $params): DeliveryReportAdaptor
    {
        $query_params = new DeliveryBodyParams($params);
        $deliveries = $this->api->getDeliveryReportList($query_params);

        return new DeliveryReportAdaptor($deliveries);
    }

    /**
     * Fetch a report of delayed delivery with delivery info
     * @param array $params
     * @return mixed|null
     *
     * @throws ValidationException
     */
    public function getDetailedDeliveryReportById(array $params): OrderDeliveryAdaptor
    {
        $query_params = new IikoId($params);
        $delivery = $this->api->getDetailedDeliveryReportById($query_params);

        return new OrderDeliveryAdaptor($delivery);
    }

    /**
     * Suppose it update something
     * this thing is strange
     * @param array $params
     * @return bool
     *
     * @throws ValidationException
     */
    public function getDeliveriesByDate(array $params): bool
    {
        $query_params = new Date($params);
        $is_ok = $this->api->getDeliveriesByDate($query_params);
        return $is_ok;
    }

    /**
     * Suppose it update something
     * this thing is strange
     * @param array $params
     * @return bool
     *
     * @throws ValidationException
     */
    public function getDeliveriesByDateRange(array $params): bool
    {
        $query_params = new DateRange($params);
        $is_ok = $this->api->getDeliveriesByDateRange($query_params);
        return $is_ok;
    }

    /**
     * Suppose it update something
     * this thing is strange
     * @param array $params
     * @return bool
     *
     * @throws ValidationException
     */
    public function getDeliveryById(array $params): bool
    {
        $query_params = new IikoId($params);
        $is_ok = $this->api->getDeliveryById($query_params);
        return $is_ok;
    }
}
