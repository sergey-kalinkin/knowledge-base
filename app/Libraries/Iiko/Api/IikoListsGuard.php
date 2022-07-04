<?php

namespace App\Libraries\Iiko\Api;


use App\Libraries\AbstractElements\AComposite;
use App\Libraries\Iiko\ApiData\QueryBody\ClientComment\ClientIdBodyCommentParams;
use App\Libraries\Iiko\ApiData\QueryBody\ClientProfile\ClientIdBodyProfileParams;
use App\Libraries\Iiko\ApiData\QueryParams\CityIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\DeliveryIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\ClientIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\IikoId;
use App\Libraries\Iiko\ApiData\QueryParams\SaleOfferReportParams;
use App\Libraries\Iiko\ApiData\QueryParams\StreetClassifierIdParams;
use App\Libraries\Iiko\ApiData\QueryParams\StreetIdParams;
use App\Libraries\Iiko\ApiData\IikoData;
use Illuminate\Validation\ValidationException;

class IikoListsGuard
{
    /**
     * @var IikoListsApi
     */
    private $api;

    public function __construct()
    {
        $this->api = new IikoListsApi();
    }

    /**
     * Fetch sale offer reports
     *
     * @param SaleOfferReportParams $params
     * @return AComposite
     */
    public function getSaleOfferReports(SaleOfferReportParams $params) : AComposite
    {
        $reports = $this->api->getSaleOfferReports($params->date_from, $params->date_to, $params->with_processing);
        $data = new IikoData($reports ?? []);
        return $data;
    }

    /**
     * Fetch city streets by iiko city id
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getCityStreets(IikoId $params) : AComposite
    {
        $streets = $this->api->getCityStreets($params->id);
        $data = new IikoData($streets ?? []);
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
     * Fetch city by iiko city id
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getCityById(IikoId $params) : AComposite
    {
        $city = $this->api->getCityById($params->id);
        $data = new IikoData($city ?? []);
        return $data;
    }

    /**
     * Fetch street by street id
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getStreetById(IikoId $params) : AComposite
    {
        $street = $this->api->getStreetById($params->id);
        $data = new IikoData($street ?? []);
        return $data;
    }

    /**
     * Fetch street by street classifier (kladr)
     *      street classifier is street kladr
     *
     * @param StreetClassifierIdParams $params
     * @return AComposite
     */
    public function getStreetByClassifierId(StreetClassifierIdParams $params) : AComposite
    {
        $street = $this->api->getStreetByClassifierId($params->classifier_id);
        $data = new IikoData($street ?? []);
        return $data;
    }

    /**
     * Fetch delivery by its id
     *
     * @param IikoId $params
     * @return AComposite
     */
    public function getDeliveryById(IikoId $params) : AComposite
    {
        $delivery = $this->api->getDeliveryById($params->id);
        $data = new IikoData($delivery ?? []);
        return $data;
    }

    /**
     * Mark order as graded by delivery id
     *
     * @param IikoId $params
     * @return bool
     */
    public function markOrderAsGraded(IikoId $params) : bool
    {
        $res = $this->api->markOrderAsGraded($params->id);
        return $res === true;
    }

    /**
     * Fetch user by phone
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getUserById(ClientIdParams $params) : AComposite
    {
        $user = $this->api->getUserById($params->id);
        $data = new IikoData($user ?? []);
        return $data;
    }

    /**
     * Search user by phone
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function searchUserByPhone(ClientIdParams $params) : AComposite
    {
        $user = $this->api->searchUserByPhone($params->id);
        $data = new IikoData($user ?? []);
        return $data;
    }

    /**
     * Fetch customer of last order by user phone
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getCustomerOfLastOrder(ClientIdParams $params) : AComposite
    {
        $customer = $this->api->getCustomerOfLastOrder($params->id);
        $data = new IikoData($customer ?? []);
        return $data;
    }

    /**
     * Fetch user deliveries
     *      a delivery is a fact of perform order
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getUserDeliveries(ClientIdParams $params) : AComposite
    {
        $deliveries = $this->api->getUserDeliveries($params->id);
        $data = new IikoData($deliveries ?? []);
        return $data;
    }

    /**
     * Fetch today's user deliveries
     *      a delivery is a fact of perform order
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getTodaysUserDeliveries(ClientIdParams $params) : AComposite
    {
        $deliveries = $this->api->getTodaysUserDeliveries($params->id);
        $data = new IikoData($deliveries ?? []);
        return $data;
    }

    /**
     * Fetch latest ungraded user order by user phone
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getLastUngradedUserOrder(ClientIdParams $params) : AComposite
    {
        $delivery = $this->api->getLastUngradedUserOrder($params->id);
        $data = new IikoData($delivery ?? []);
        return $data;
    }

    /**
     * Fetch iikocard transactions
     *                      by user phone
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getIikocardTransactions(ClientIdParams $params) : AComposite
    {
        $transactions = $this->api->getIikocardTransactions($params->id);
        $data = new IikoData($transactions ?? []);
        return $data;
    }

    /**
     * Fetch comment about user
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getCommentAboutUser(ClientIdParams $params) : AComposite
    {
        $comment = $this->api->getCommentAboutUser($params->id);
        $data = new IikoData($comment ?? []);
        return $data;
    }

    /**
     * Attach comment to a user
     *
     * @param ClientIdBodyCommentParams $params
     * @return mixed|null
     */
    //TODO monolite signature for params and body
    public function addCommentToUser(ClientIdBodyCommentParams $params) : AComposite
    {
        $user = $this->api->addCommentToUser($params->id, $params->getBody());
        $data = new IikoData($user ?? []);
        return $data;
    }

    /**
     * Fetch user profile
     *
     * @param ClientIdParams $params
     * @return AComposite
     */
    public function getUserProfile(ClientIdParams $params) : AComposite
    {
        $profile = $this->api->getUserProfile($params->id);
        $data = new IikoData($profile ?? []);
        return $data;
    }

    /**
     * Change user profile data
     *
     * @param ClientIdBodyProfileParams $params
     * @return bool
     */
    //TODO monolite signature for params and body
    public function editUserProfile(ClientIdBodyProfileParams $params) : bool
    {
        $res = $this->api->editUserProfile($params->id, $params->getBody());
        return $res === true;
    }

    /**
     * Fetch active terminals
     *
     * @return AComposite
     */
    public function getActiveTerminals() : AComposite
    {
        $terminals = $this->api->getActiveTerminals();
        $data = new IikoData($terminals ?? []);
        return $data;
    }

    /**
     * Fetch terminals
     *
     * @return AComposite
     */
    public function getTerminals() : AComposite
    {
        $terminals = $this->api->getTerminals();
        $data = new IikoData($terminals ?? []);
        return $data;
    }

    /**
     * Fetch employees
     *
     * @return AComposite
     */
    public function getEmptyEmployees() : AComposite
    {
        $employees = $this->api->getEmptyEmployees();
        $data = new IikoData($employees ?? []);
        return $data;
    }
}
