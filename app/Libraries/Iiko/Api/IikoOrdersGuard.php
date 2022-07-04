<?php

namespace App\Libraries\Iiko\Api;

use App\Libraries\AbstractElements\AComposite;
use App\Libraries\AbstractElements\IQueryBody;
use App\Libraries\Iiko\ApiData\QueryParams\Date;
use App\Libraries\Iiko\ApiData\QueryParams\DateRange;
use App\Libraries\Iiko\ApiData\QueryParams\IikoId;
use App\Libraries\Iiko\ApiData\IikoData;

class IikoOrdersGuard
{
    /**
     * @var IikoListsApi
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoOrdersApi();
    }

    /**
     * Fetch delivery terminals
     *
     * @return AComposite
     */
    public function getCityDeliveryTerminals() : AComposite
    {
        $delivery_terminals = $this->api->getCityDeliveryTerminals();
        $data = new IikoData($delivery_terminals ?? []);
        return $data;
    }

    /**
     * Fetch stop list
     *
     * @return AComposite
     */
    public function getStopList() : AComposite
    {
        $stop_list = $this->api->getStopList();
        $data = new IikoData($stop_list ?? []);
        return $data;
    }

    /**
     * Fetch payment types
     *
     * @return AComposite
     */
    public function getPaymentTypes() : AComposite
    {
        $payment_types = $this->api->getPaymentTypes();
        $data = new IikoData($payment_types ?? []);
        return $data;
    }

    /**
     * Fetch nomenclature groups
     *
     * @return AComposite
     */
    public function getNomenclatureGroups() : AComposite
    {
        $nomenclature_groups = $this->api->getNomenclatureGroups();
        $data = new IikoData($nomenclature_groups ?? []);
        return $data;
    }

    /**
     * Fetch delivery terminals
     *
     * @return AComposite
     */
    public function getDeliveryTerminals() : AComposite
    {
        $delivery_terminals = $this->api->getDeliveryTerminals();
        $data = new IikoData($delivery_terminals ?? []);
        return $data;
    }

    /**
     * Fetch nomenclature
     *
     * @return AComposite
     */
    public function getNomenclature() : AComposite
    {
        $nomenclature = $this->api->getNomenclature();
        $data = new IikoData($nomenclature ?? []);
        return $data;
    }

    /**
     * Fetch available cities
     *
     * @return AComposite
     */
    public function getCities() : AComposite
    {
        $cities = $this->api->getCities();
        $data = new IikoData($cities ?? []);
        return $data;
    }

    /**
     * Fetch streets
     *
     * @return AComposite
     */
    public function getStreets() : AComposite
    {
        $streets = $this->api->getStreets();
        $data = new IikoData($streets ?? []);
        return $data;
    }

    /**
     * Fetch grouped nomenclature
     *
     * @return AComposite
     */
    public function getGroupedNomenclature() : AComposite
    {
        $nomenclature = $this->api->getGroupedNomenclature();
        $data = new IikoData($nomenclature ?? []);
        return $data;
    }

    /**
     * Validate order data
     *
     * @param IQueryBody $data
     * @return AComposite
     */
    public function validateOrder(IQueryBody $data) : AComposite
    {
        $is_valid = $this->api->validateOrder($data->getBody());
        $data = new IikoData($is_valid ?? []);
        return $data;
    }

    /**
     * Create order
     *
     * @param IQueryBody $data
     * @return AComposite
     */
    public function createOrder(IQueryBody $data) : AComposite
    {
        $created_order_data = $this->api->createOrder($data->getBody());
        $data = new IikoData($created_order_data ?? []);
        return $data;
    }

    /**
     * Fetch log of attempt on order creation
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getOrderCreationAttemptLogByRequestId(IikoId $params) : AComposite
    {
        $log = $this->api->getOrderCreationAttemptLogByRequestId($params->id);
        $data = new IikoData($log ?? []);
        return $data;
    }

    /**
     * Fetch logs of attempt on order creation by date
     *
     * @param Date $params
     * @return AComposite
     */
    public function getOrderCreationAttemptLogByDate(Date $params) : AComposite
    {
        $log = $this->api->getOrderCreationAttemptLogByRequestId($params->date);
        $data = new IikoData($log ?? []);
        return $data;
    }

    /**
     * Fetch logs of attempt on order creation by date range
     *
     * @param DateRange $params
     * @return AComposite
     */
    public function getOrderCreationAttemptLogByDateRange(DateRange $params) : AComposite
    {
        $log = $this->api->getOrderCreationAttemptLogByDateRange($params->date_from, $params->date_to);
        $data = new IikoData($log ?? []);
        return $data;
    }

    /**
     * Fetch order creation log
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getOrderCreationResult(IikoId $params) : AComposite
    {
        $log = $this->api->getOrderCreationResult($params->id);
        $data = new IikoData($log ?? []);
        return $data;
    }
}
