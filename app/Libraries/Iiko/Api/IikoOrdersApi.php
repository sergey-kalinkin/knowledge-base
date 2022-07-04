<?php

namespace App\Libraries\Iiko\Api;

class IikoOrdersApi
{
    /**
     * @var IikoOrdersConfigApi
     */
    private $api;

    /**
     * init
     */
    public function __construct()
    {
        $this->api = new IikoOrdersConfigApi();
    }

    /**
     * Fetch delivery terminals
     *
     * @return mixed|null
     */
    public function getCityDeliveryTerminals()
    {
        $delivery_terminals = $this->api->get("data/terminals/v2");
        return $delivery_terminals;
    }

    /**
     * Fetch stop list
     *
     * @return mixed|null
     */
    public function getStopList()
    {
        $stop_list = $this->api->get("data/stop-list");
        return $stop_list;
    }

    /**
     * Fetch payment types
     *
     * @return mixed|null
     */
    public function getPaymentTypes()
    {
        $payment_types = $this->api->get("data/payment-types");
        return $payment_types;
    }

    /**
     * Fetch nomenclature groups
     *
     * @return mixed|null
     */
    public function getNomenclatureGroups()
    {
        $nomenclature_groups = $this->api->get("data/nomenclature-groups");
        return $nomenclature_groups;
    }

    /**
     * Fetch delivery terminals
     *
     * @return mixed|null
     */
    public function getDeliveryTerminals()
    {
        $delivery_terminals = $this->api->get("data/terminals");
        return $delivery_terminals;
    }

    /**
     * Fetch nomenclature
     *
     * @return mixed|null
     */
    public function getNomenclature()
    {
        $nomenclature = $this->api->get("data/nomenclature");
        return $nomenclature;
    }

    /**
     * Fetch cities
     *
     * @return mixed|null
     */
    public function getCities()
    {
        $cities = $this->api->get("data/cities");
        return $cities;
    }

    /**
     * Fetch streets
     *
     * @return mixed|null
     */
    public function getStreets()
    {
        $cities = $this->api->get("data/streets");
        return $cities;
    }

    /**
     * Fetch grouped nomenclature
     *
     * @return mixed|null
     */
    public function getGroupedNomenclature()
    {
        $nomenclature = $this->api->get("data/menu/by-group");
        return $nomenclature;
    }

    /**
     * Validate order data
     *
     * @return mixed|null
     */
    public function validateOrder(array $order)
    {
        $is_valid = $this->api->post("orders/validate", $order);
        return $is_valid;
    }

    /**
     * Create order
     *
     * @return mixed|null
     */
    public function createOrder(array $order)
    {
        $created_order_data = $this->api->post("orders/create", $order);
        return $created_order_data;
    }

    /**
     * Fetch log of attempt on order creation
     *
     * @return mixed|null
     */
    public function getOrderCreationAttemptLogByRequestId(string $request_id)
    {
        $log = $this->api->get("requests/{$request_id}");
        return $log;
    }

    /**
     * Fetch logs of attempt on order creation by date
     *
     * @return mixed|null
     */
    public function getOrderCreationAttemptLogByDate(string $date)
    {
        $log = $this->api->get("requests/date/{$date}");
        return $log;
    }

    /**
     * Fetch logs of attempt on order creation by date range
     *
     * @return mixed|null
     */
    public function getOrderCreationAttemptLogByDateRange(string $date_from, string $date_to)
    {
        $log = $this->api->get("requests/date/{$date_from}/{$date_to}");
        return $log;
    }

    /**
     * Fetch order creation log
     *
     * @return mixed|null
     */
    public function getOrderCreationResult(string $request_id)
    {
        $log = $this->api->get("requests/order-info/{$request_id}");
        return $log;
    }
}
