<?php

namespace App\Libraries\Iiko\Api;


use App\Libraries\Iiko\ApiData\DataAdaptors\CityAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CityDeliveryTerminalAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\NomenclatureAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\NomenclatureGroupAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderCreationAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderCreationAttemptAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderValidationAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\PaymentTypeAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\StopListAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\StreetAdaptor;
use App\Libraries\Iiko\ApiData\QueryBody\Order\OrderBodyByRequestData;
use App\Libraries\Iiko\ApiData\QueryParams\Date;
use App\Libraries\Iiko\ApiData\QueryParams\DateRange;
use App\Libraries\Iiko\ApiData\QueryParams\RequestIdParams;
use Illuminate\Validation\ValidationException;

class IikoOrders
{
    /**
     * @var IikoListsGuard
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoOrdersGuard();
    }

    /**
     * Fetch delivery terminals
     *
     * @return CityDeliveryTerminalAdaptor
     */
    public function getCityDeliveryTerminals() : CityDeliveryTerminalAdaptor
    {
        $delivery_terminals = $this->api->getCityDeliveryTerminals();
        return new CityDeliveryTerminalAdaptor($delivery_terminals);
    }

    /**
     * Fetch stop list
     *
     * @return StopListAdaptor
     */
    public function getStopList() : StopListAdaptor
    {
        $stop_list = $this->api->getStopList();
        return new StopListAdaptor($stop_list);
    }

    /**
     * Fetch payment types
     *
     * @return PaymentTypeAdaptor
     */
    public function getPaymentTypes() : PaymentTypeAdaptor
    {
        $payment_types = $this->api->getPaymentTypes();
        return new PaymentTypeAdaptor($payment_types);
    }

    /**
     * Fetch nomenclature groups
     *
     * @return NomenclatureGroupAdaptor
     */
    public function getNomenclatureGroups() : NomenclatureGroupAdaptor
    {
        $nomenclature_groups = $this->api->getNomenclatureGroups();
        return new NomenclatureGroupAdaptor($nomenclature_groups);
    }

    /**
     * Fetch delivery terminals
     *
     * @return CityDeliveryTerminalAdaptor
     */
    public function getDeliveryTerminals() : CityDeliveryTerminalAdaptor
    {
        $delivery_terminals = $this->api->getDeliveryTerminals();
        return new CityDeliveryTerminalAdaptor($delivery_terminals);
    }

    /**
     * Fetch nomenclature
     *
     * @return NomenclatureAdaptor
     */
    public function getNomenclature() : NomenclatureAdaptor
    {
        $nomenclature = $this->api->getNomenclature();
        return new NomenclatureAdaptor($nomenclature);
    }

    /**
     * Fetch available cities
     *
     * @return CityAdaptor
     */
    public function getCities() : CityAdaptor
    {
        $cities = $this->api->getCities();
        return new CityAdaptor($cities);
    }

    /**
     * Fetch streets
     *
     * @return StreetAdaptor
     */
    public function getStreets() : StreetAdaptor
    {
        $streets = $this->api->getStreets();
        return new StreetAdaptor($streets);
    }

    /**
     * Fetch grouped nomenclature
     *
     * @return NomenclatureAdaptor
     */
    public function getGroupedNomenclature(): NomenclatureAdaptor
    {
        $nomenclature = $this->api->getGroupedNomenclature();
        return new NomenclatureAdaptor($nomenclature);
    }

    /**
     * Validate order data
     *
     * @param array $order
     *
     * @return OrderValidationAdaptor
     * @throws ValidationException
     */
    public function validateOrderByData(array $order) : OrderValidationAdaptor
    {
        $order = new OrderBodyByRequestData($order);
        $val_res = $this->api->validateOrder($order);
        return new OrderValidationAdaptor($val_res);
    }

    /**
     * Create order
     *
     * @param array $order
     *
     * @return OrderCreationAdaptor
     * @throws ValidationException
     */
    public function createOrderByData(array $order) : OrderCreationAdaptor
    {
        $order = new OrderBodyByRequestData($order);
        $created_res = $this->api->createOrder($order);
        return new OrderCreationAdaptor($created_res);
    }

    /**
     * Fetch log of attempt on order creation
     *
     * @param array $params
     *      @type string $request_id - iiko request id
     *
     * @return OrderCreationAttemptAdaptor
     * @throws ValidationException
     */
    public function getOrderCreationAttemptLogByRequestId(array $params) : OrderCreationAttemptAdaptor
    {
        $query_params = new RequestIdParams($params);
        $log = $this->api->getOrderCreationAttemptLogByRequestId($query_params);
        return new OrderCreationAttemptAdaptor($log);
    }

    /**
     * Fetch logs of attempt on order creation by date
     *
     * @param array $params
     *      @type string $date
     *
     * @return OrderCreationAttemptAdaptor
     * @throws ValidationException
     */
    public function getOrderCreationAttemptLogByDate(array $params) : OrderCreationAttemptAdaptor
    {
        $query_params = new Date($params);
        $log = $this->api->getOrderCreationAttemptLogByDate($query_params);
        return new OrderCreationAttemptAdaptor($log);
    }

    /**
     * Fetch logs of attempt on order creation by date range
     *
     * @param array $params
     *      @type string $date_from
     *      @type string $date_to
     *
     * @return OrderCreationAttemptAdaptor
     * @throws ValidationException
     */
    public function getOrderCreationAttemptLogByDateRange(array $params) : OrderCreationAttemptAdaptor
    {
        $query_params = new DateRange($params);
        $log = $this->api->getOrderCreationAttemptLogByDateRange($query_params);
        return new OrderCreationAttemptAdaptor($log);
    }

    /**
     * Fetch order creation log
     *
     * @param array $params
     *      @type string $request_id - iiko request id
     *
     * @return DeliveryAdaptor
     * @throws ValidationException
     */
    public function getOrderCreationResult(array $params) : DeliveryAdaptor
    {
        $query_params = new RequestIdParams($params);
        $log = $this->api->getOrderCreationResult($query_params);
        return new DeliveryAdaptor($log);
    }
}
