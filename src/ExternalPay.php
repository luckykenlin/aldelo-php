<?php

namespace Luckykenlin\Aldelo;

/**
 * Class ExternalPay
 * @package Luckykenlin\Aldelo\ExternalPay
 */
class ExternalPay extends Aldelo
{
    /**
     * Record an externally paid transaction using Express External Pay Tender against a specific order.
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

        $externalPay = $httpClient->post("$version/externalPay", [
            'json' => $data,
        ]);

        return $externalPay;
    }

    /**
     * Get the isv registered external payment tender type for the connected store.
     * This api call returns the appropriate external tender type that this isv solution may use when payment processing is handled external to Express integrated payments.
     *
     * @param $employeeId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function retrieve(int $employeeId)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $externalPay = $httpClient->get("$version/externalPay/{$employeeId}");

        return $externalPay;
    }

    /**
     * Remove a prior external pay record from Express payments for an order still in open status.
     *
     * @param int $id
     * @return mixed
     * @throws Exceptions\AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function void(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $externalPay = $httpClient->delete("$version/externalPay/{$id}");

        return $externalPay;
    }
}
