<?php

namespace App\Libraries\Iiko\Api;


class IikoDashboardApi
{
    /**
     * @var IikoDashboardConfigApi
     */
    private $api;

    /**
     * init
     */
    public function __construct()
    {
        $this->api = new IikoDashboardConfigApi();
    }

    /**
     * Suppose it update something
     * @param string $date_from - start date in format Y-m-d
     * @param string|null $date_to - end date in format Y-m-d
     * @return mixed|null
     */
    public function getDeliveriesByDate(string $date_from, ?string $date_to = null)
    {
        $url = "reports/delayed/process/by-date/$date_from";
        $url .= isset($date_to) ? "/$date_to" : '';

        $deliveries = $this->api->get($url);
        return $deliveries;
    }

    /**
     * Suppose it update something
     * @param string $iiko_delivery_id
     * @return mixed|null
     */
    public function getDeliveryById(string $iiko_delivery_id)
    {
        $deliveries = $this->api->get("reports/delayed/process/by-id/$iiko_delivery_id");
        return $deliveries;
    }

    /**
     * Fetch reports of delayed deliveries
     * @param array $data - data defined a sample of the delayed deliveries
     * @return mixed|null
     */
    public function getDeliveryReportList(array $data)
    {
        $deliveries = $this->api->post('reports/delayed', $data);
        return $deliveries;
    }

    /**
     * Fetch a report of delayed delivery with delivery info
     * @param string $delivery_id
     * @return mixed|null
     */
    public function getDetailedDeliveryReportById(string $delivery_id)
    {
        $deliveries = $this->api->get("cache/$delivery_id");
        return $deliveries;
    }
}
