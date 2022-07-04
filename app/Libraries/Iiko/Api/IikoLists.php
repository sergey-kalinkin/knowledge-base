<?php

namespace App\Libraries\Iiko\Api;


use App\Libraries\Iiko\ApiData\DataAdaptors\CityAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ClientAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CommentClientAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CustomerAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryHeaderAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\EmployeeAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\IikoCardTransactionAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ProfileAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\SaleOfferReportAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\StreetAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\TerminalAdaptor;
use App\Libraries\Iiko\ApiData\QueryBody\ClientComment\ClientIdBodyCommentParams;
use App\Libraries\Iiko\ApiData\QueryBody\ClientProfile\ClientIdBodyProfileParams;
use App\Libraries\Iiko\ApiData\QueryParams\CityIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\DeliveryIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\ClientIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\SaleOfferReportParams;
use App\Libraries\Iiko\ApiData\QueryParams\StreetClassifierIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\StreetIdParams;
use Illuminate\Validation\ValidationException;

class IikoLists
{
    /**
     * @var IikoListsGuard
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoListsGuard();
    }

    /**
     * Fetch sale offer reports
     *
     * @param array $params
     *      @type string $date_from - Y-m-d format
     *      @type string $date_to - Y-m-d format
     *      @type bool $with_processing
     *
     * @return SaleOfferReportAdaptor
     * @throws ValidationException
     */
    public function getSaleOfferReports(array $params) : SaleOfferReportAdaptor
    {
        $query_params = new SaleOfferReportParams($params);
        $reports = $this->api->getSaleOfferReports($query_params);
        return new SaleOfferReportAdaptor($reports);
    }

    /**
     * Fetch city streets by iiko city id
     *
     * @param array $params
     *      @type string "id" - iiko city id
     *
     * @return StreetAdaptor
     * @throws ValidationException
     */
    public function getCityStreets(array $params) : StreetAdaptor
    {
        $query_params = new CityIdParams($params);
        $streets = $this->api->getCityStreets($query_params);
        return new StreetAdaptor($streets);
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
     * Fetch city by iiko city id
     *
     * @param array $params
     *      @type string "id" - iiko city id
     *
     * @return CityAdaptor
     * @throws ValidationException
     */
    public function getCityById(array $params) : CityAdaptor
    {
        $query_params = new CityIdParams($params);
        $city = $this->api->getCityById($query_params);
        return new CityAdaptor($city);
    }

    /**
     * Fetch street by street id
     *
     * @param array $params
     *      @type string "id" - iiko street id
     *
     * @return StreetAdaptor
     * @throws ValidationException
     */
    public function getStreetById(array $params): StreetAdaptor
    {
        $query_params = new StreetIdParams($params);
        $street = $this->api->getStreetById($query_params);
        return new StreetAdaptor($street);
    }

    /**
     * Fetch street by street classifier (kladr)
     *      street classifier is street kladr
     *
     * @param array $params
     *      @type string "classifier_id" - kladr of a street
     *
     * @return StreetAdaptor
     * @throws ValidationException
     */
    public function getStreetByClassifierId(array $params) : StreetAdaptor
    {
        $query_params = new StreetClassifierIdParams($params);
        $street = $this->api->getStreetByClassifierId($query_params);
        return new StreetAdaptor($street);
    }

    /**
     * Fetch delivery by its id
     *
     * @param array $params
     *      @type string "id" - iiko delivery id
     *
     * @return DeliveryAdaptor
     * @throws ValidationException
     */
    public function getDeliveryById(array $params) : DeliveryAdaptor
    {
        $query_params = new DeliveryIdParams($params);
        $delivery = $this->api->getDeliveryById($query_params);
        return new DeliveryAdaptor($delivery);
    }

    /**
     * Mark order as graded by delivery id
     *
     * @param array $params
     * @return bool
     * @throws ValidationException
     */
    public function markOrderAsGraded(array $params) : bool
    {
        $query_params = new DeliveryIdParams($params);
        return $this->api->markOrderAsGraded($query_params);
    }

    /**
     * Fetch user by phone
     *
     * @param array $params
     * @return ClientAdaptor
     * @throws ValidationException
     */
    public function getUserById(array $params) : ClientAdaptor
    {
        $query_params = new ClientIdParams($params);
        $user = $this->api->getUserById($query_params);
        return new ClientAdaptor($user);
    }

    /**
     * Search user by phone
     *
     * @param array $params
     * @return ClientAdaptor
     * @throws ValidationException
     */
    public function searchUserByPhone(array $params) : ClientAdaptor
    {
        $query_params = new ClientIdParams($params);
        $user = $this->api->searchUserByPhone($query_params);
        return new ClientAdaptor($user);
    }

    /**
     * Fetch customer of last order by user phone
     *
     * @param array $params
     * @return CustomerAdaptor
     * @throws ValidationException
     */
    public function getCustomerOfLastOrder(array $params) : CustomerAdaptor
    {
        $query_params = new ClientIdParams($params);
        $customer = $this->api->getCustomerOfLastOrder($query_params);
        return new CustomerAdaptor($customer);
    }

    /**
     * Fetch user deliveries
     *      a delivery is a fact of perform order
     *
     * @param array $params
     * @return DeliveryHeaderAdaptor
     * @throws ValidationException
     */
    public function getUserDeliveries(array $params) : DeliveryHeaderAdaptor
    {
        $query_params = new ClientIdParams($params);
        $deliveries = $this->api->getUserDeliveries($query_params);
        return new DeliveryHeaderAdaptor($deliveries);
    }

    /**
     * Fetch today's user deliveries
     *      a delivery is a fact of perform order
     *
     * @param array $params
     * @return DeliveryHeaderAdaptor
     * @throws ValidationException
     */
    public function getTodaysUserDeliveries(array $params) : DeliveryHeaderAdaptor
    {
        $query_params = new ClientIdParams($params);
        $deliveries = $this->api->getTodaysUserDeliveries($query_params);
        return new DeliveryHeaderAdaptor($deliveries);
    }

    /**
     * Fetch latest ungraded user order by user phone
     *
     * @param array $params
     * @return DeliveryHeaderAdaptor
     * @throws ValidationException
     */
    public function getLastUngradedUserOrder(array $params) : DeliveryHeaderAdaptor
    {
        $query_params = new ClientIdParams($params);
        $delivery = $this->api->getLastUngradedUserOrder($query_params);
        return new DeliveryHeaderAdaptor($delivery);
    }

    /**
     * Fetch iikocard transactions
     *                      by user phone
     *
     * @param array $params
     * @return IikoCardTransactionAdaptor
     * @throws ValidationException
     */
    public function getIikocardTransactions(array $params) : IikoCardTransactionAdaptor
    {
        $query_params = new ClientIdParams($params);
        $transactions = $this->api->getIikocardTransactions($query_params);
        return new IikoCardTransactionAdaptor($transactions);
    }

    /**
     * Fetch comment about user
     *
     * @param array $params
     * @return CommentClientAdaptor
     * @throws ValidationException
     */
    public function getCommentAboutUser(array $params) : CommentClientAdaptor
    {
        $query_params = new ClientIdParams($params);
        $comments = $this->api->getCommentAboutUser($query_params);
        return new CommentClientAdaptor($comments);
    }

    /**
     * Attach comment to a user
     *
     * @param array $params
     * @return mixed|null
     * @throws ValidationException
     */
    public function addCommentToUser(array $params) : CommentClientAdaptor
    {
        $query_params = new ClientIdBodyCommentParams($params);
        $comment = $this->api->addCommentToUser($query_params);
        return new CommentClientAdaptor($comment);
    }

    /**
     * Fetch user profile
     *
     * @param array $params
     * @return ProfileAdaptor
     * @throws ValidationException
     */
    public function getUserProfile(array $params) : ProfileAdaptor
    {
        $query_params = new ClientIdParams($params);
        $profile = $this->api->getUserProfile($query_params);
        return new ProfileAdaptor($profile);
    }

    /**
     * Change user profile data
     *
     * @param array $params
     * @return bool
     * @throws ValidationException
     */
    public function editUserProfile(array $params) : bool
    {
        $query_params = new ClientIdBodyProfileParams($params);
        $res = $this->api->editUserProfile($query_params);
        return $res;
    }

    /**
     * Fetch active terminals
     *
     * @return TerminalAdaptor
     */
    public function getActiveTerminals() : TerminalAdaptor
    {
        $terminals = $this->api->getActiveTerminals();
        return new TerminalAdaptor($terminals);
    }

    /**
     * Fetch terminals
     *
     * @return TerminalAdaptor
     */
    public function getTerminals() : TerminalAdaptor
    {
        $terminals = $this->api->getTerminals();
        return new TerminalAdaptor($terminals);
    }

    /**
     * Fetch employees
     *
     * @return EmployeeAdaptor
     */
    public function getEmptyEmployees() : EmployeeAdaptor
    {
        $employees = $this->api->getEmptyEmployees();
        return new EmployeeAdaptor($employees);
    }
}
