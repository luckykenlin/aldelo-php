<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Surcharge
 * @package Luckykenlin\Aldelo\Surcharge
 */
class Surcharge extends Aldelo
{
    /**
     * Get active surcharge details by surcharge ID.
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

        $surcharge = $httpClient->get("$version/surcharge/{$id}");

        return $surcharge;
    }

    /**
     * Get an active list of surcharges.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $surcharges = $httpClient->get("$version/surchargeList");

        return $surcharges;
    }
}
