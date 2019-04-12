<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Order
 * @package Luckykenlin\Aldelo\Order
 */
class Order extends Aldelo
{
    const DINE_IN = 1;
    const BAR = 2;
    const TAKE_OUT = 3;
    const DRIVE_THRU = 4;
    const DELIVERY = 5;
    const RETAIL = 6;

    const STATUS_NEW = 1;
    const STATUS_SETTLE = 2;
    const STATUS_VOID = 3;

    /**
     * Add a new order to the store.
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

        $order = $httpClient->post("$version/order", [
            'json' => $data,
        ]);

        return $order;
    }

    /**
     * Update an existing open status order.
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

        $order = $httpClient->put("$version/order", [
            'json' => $data,
        ]);

        return $order;
    }

    /**
     * Get the order and details based on the given order ID.
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

        $order = $httpClient->get("$version/order/{$id}");

        return $order;
    }

    /**
     * Get an list of orders based on the required date. Date format is yyyymmdd.
     * Additional filter options provided via optional query parameters.
     * Only current date and previous 2 days of data may be retrieved.
     *
     * @param array $query
     * @param $requiredDate
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function fetch($requiredDate, array $query = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $orders = $httpClient->get("$version/orderList/{$requiredDate}", [
            'query' => $query
        ]);

        return $orders;
    }

    /**
     * Void an existing open status order.
     *
     * @param int $id
     * @param string $reason
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function void(int $id, string $reason = '')
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $orders = $httpClient->delete("$version/order/{$id}", [
            'reason' => $reason
        ]);

        return $orders;
    }
}
