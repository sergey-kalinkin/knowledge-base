<?php

namespace App\Libraries\Iiko\Api;

class IikoListsApi
{
    /**
     * @var IikoListsConfigApi
     */
    private $api;

    /**
     * init
     */
    public function __construct()
    {
        $this->api = new IikoListsConfigApi();
    }

    /**
     * Fetch latest ungraded user order by user phone
     *
     * @param string $user_phone
     * @return mixed|null
     */
    public function getLastUngradedUserOrder(string $user_phone)
    {
        $delivery = $this->api->get("guests/{$user_phone}/deliveries/assessment/available/header");
        return $delivery;
    }

    /**
     * Fetch user deliveries
     *      a delivery is a fact of perform order
     *
     * @param string $user_phone
     * @return mixed|null
     */
    public function getUserDeliveries(string $user_phone)
    {
        $deliveries = $this->api->get("guests/{$user_phone}/deliveries/headers");
        return $deliveries;
    }

    /**
     * Mark order as graded by delivery id
     *
     * @param $iiko_delivery_id
     * @return mixed|null
     */
    public function markOrderAsGraded($iiko_delivery_id)
    {
        $res = $this->api->post("deliveries/{$iiko_delivery_id}/assess");
        return $res;
    }

    /**
     * Fetch sale offer reports
     * @param string $date_from - start date in format Y-m-d
     * @param string $date_to - end date in format Y-m-d
     * @param string $with_processing - ? [not ended offers]
     * @return mixed|null
     */
    public function getSaleOfferReports(string $date_from, string $date_to, string $with_processing)
    {
        $reports = $this->api->get("reports/olap/sales/calculator/{$date_from}/{$date_to}?withProcessing={$with_processing}");
        return $reports;
    }

    /**
     * Fetch available cities
     * @return mixed|null
     */
    public function getCities()
    {
        $cities = $this->api->get('cities');
        return $cities;
    }

    /**
     * Fetch city by iiko city id
     * @param $iiko_city_id
     * @return mixed|null
     */
    public function getCityById($iiko_city_id)
    {
        $city = $this->api->get("cities/{$iiko_city_id}");
        return $city;
    }

    /**
     * Fetch city streets by iiko city id
     * @param $iiko_city_id
     * @return mixed|null
     */
    public function getCityStreets($iiko_city_id)
    {
        $streets = $this->api->get("cities/{$iiko_city_id}/streets");
        return $streets;
    }

    /**
     * Fetch street by street id
     * @param $iiko_street_id
     * @return mixed|null
     */
    public function getStreetById($iiko_street_id)
    {
        $street = $this->api->get("streets/{$iiko_street_id}");
        return $street;
    }

    /**
     * Fetch street by street classifier (kladr)
     *      street classifier is street kladr
     * @param $classifier_id
     * @return mixed|null
     */
    public function getStreetByClassifierId($classifier_id)
    {
        $street = $this->api->get("streets/classifier/{$classifier_id}");
        return $street;
    }

    /**
     * Fetch delivery by its id
     * @param $iiko_delivery_id
     * @return mixed|null
     */
    public function getDeliveryById($iiko_delivery_id)
    {
        $delivery = $this->api->get("deliveries/{$iiko_delivery_id}");
        return $delivery;
    }

    /**
     * Fetch user by phone
     * @param string $user_phone
     * @return mixed|null
     */
    public function getUserById(string $user_phone)
    {
        $user = $this->api->get("guests/{$user_phone}");
        return $user;
    }

    /**
     * Search user by phone
     * @param string $user_phone
     * @return mixed|null
     */
    public function searchUserByPhone(string $user_phone)
    {
        $user = $this->api->get("guests/search/by-phone/{$user_phone}");
        return $user;
    }

    /**
     * Fetch customer of last order by user phone
     *
     * @param string $user_phone
     * @return mixed|null
     */
    public function getCustomerOfLastOrder(string $user_phone)
    {
        $customer = $this->api->get("guests/{$user_phone}/customer");
        return $customer;
    }

    /**
     * Fetch today's user deliveries
     *      a delivery is a fact of perform order
     *
     * @param string $user_phone
     * @return mixed|null
     */
    public function getTodaysUserDeliveries(string $user_phone)
    {
        $deliveries = $this->api->get("guests/{$user_phone}/deliveries/today/headers");
        return $deliveries;
    }

    /**
     * Fetch iikocard transactions
     *                      by user phone
     * @param string $user_phone
     * @return mixed|null
     */
    public function getIikocardTransactions(string $user_phone)
    {
        $transactions = $this->api->get("guests/{$user_phone}/iikocard-transactions");
        return $transactions;
    }

    /**
     * Fetch comment about user
     * @param string $user_phone
     * @return mixed|null
     */
    public function getCommentAboutUser(string $user_phone)
    {
        $comment = $this->api->get("guests/{$user_phone}/comments");
        return $comment;
    }

    /**
     * Attach comment to a user
     *
     * @param string $user_phone
     * @param array $data - data with comment
     * @return mixed|null
     */
    public function addCommentToUser(string $user_phone, array $data)
    {
        $user = $this->api->post("guests/{$user_phone}/comments", $data);
        return $user;
    }

    /**
     * Fetch user profile
     *
     * @param string $user_phone
     * @return mixed|null
     */
    public function getUserProfile(string $user_phone)
    {
        $profile = $this->api->get("guests/profiles/{$user_phone}");
        return $profile;
    }

    /**
     * Change user profile data
     *
     * @param string $user_phone
     * @param array $data - profile data
     * @return mixed|null
     */
    public function editUserProfile(string $user_phone, array $data)
    {
        $profile = $this->api->post("guests/profiles/{$user_phone}", $data);
        return $profile;
    }

    /**
     * Fetch active terminals
     *
     * @return mixed|null
     */
    public function getActiveTerminals()
    {
        $terminals = $this->api->get("tmp_terminals/active");
        return $terminals;
    }

    /**
     * Fetch terminals
     *
     * @return mixed|null
     */
    public function getTerminals()
    {
        $terminals = $this->api->get("tmp_terminals");
        return $terminals;
    }

    /**
     * Fetch terminals by panda employee user id
     *
     * @param $iiko_owner_id - panda owner user id
     * @return mixed|null
     */
    public function getEmployeesTerminals($iiko_owner_id)
    {
        $terminals = $this->api->get("tmp_terminals/by-user/{$iiko_owner_id}");
        return $terminals;
    }

    /**
     * Fetch panda employees
     *
     * @return mixed|null
     */
    public function getEmployees()
    {
        $employees = $this->api->get("users");
        return $employees;
    }

    /**
     * Fetch panda employees
     *
     * @return mixed|null
     */
    public function getEmptyEmployees()
    {
        $employees = $this->api->get("users/empty-credentials");
        return $employees;
    }
}
