<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Surcharge
 * @package Luckykenlin\Aldelo\Surcharge
 */
class Surcharge extends Aldelo
{
    /**
     * Retrieve an surcharge.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $surcharge = $httpClient->get("$version/surcharge/{$id}");

        return $surcharge;
    }

    /**
     * Fetch all surcharges.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $surcharges = $httpClient->get("$version/surchargeList");

        return $surcharges;
    }
}
