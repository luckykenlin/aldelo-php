<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Order
 * @package Luckykenlin\Aldelo\Order
 */
class Order extends Aldelo
{
    /**
     * Create an order.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * Update an order info.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
     * Retrieve an order.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $order = $httpClient->get("$version/order/{$id}");

        return $order;
    }

    /**
     * Fetch all orders.
     *
     * @param array $query
     * @param $requiredDate
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(array $query, $requiredDate)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $orders = $httpClient->get("$version/orderList/{$requiredDate}", [
            'query' => $query
        ]);

        return $orders;
    }

    /**
     * Delete order.
     *
     * @param int $id
     * @param string $reason
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
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
