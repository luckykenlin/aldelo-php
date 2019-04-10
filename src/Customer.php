<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Customer
 * @package Luckykenlin\Aldelo\Customer
 */
class Customer extends Aldelo
{
    /**
     * Create an customer.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function create(array $data = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $customer = $httpClient->post("$version/customer", [
            'json' => $data,
        ]);

        return $customer;
    }

    /**
     * Update an customer info.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function update(array $data = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $customer = $httpClient->put("$version/customer", [
            'json' => $data,
        ]);

        return $customer;
    }

    /**
     * Retrieve an customer.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $customer = $httpClient->get("$version/customer/{$id}");

        return $customer;
    }

    /**
     * Fetch all customers.
     *
     * @param array $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function fetch(array $query = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $customers = $httpClient->get("$version/customer", [
            'query' => $query
        ]);

        return $customers;
    }
}
