<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Boarding
 * @package Luckykenlin\Aldelo\Boarding
 */
class Boarding extends Aldelo
{
    /**
     * Get a list of ISV app connected stores boarded for the given date range.
     * ISV can use this API call to retrieve all stores and info boarded on given date range for the integrated app,
     * so that it can automate its own on boarding process.
     *
     * @param int $requiredBeginDate
     * @param int $requiredEndDate
     * @return mixed
     * @throws Exceptions\AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetchConnectedStores(int $requiredBeginDate, int $requiredEndDate)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;
        $stores = $httpClient->get("$version/boarding/connected/{$requiredBeginDate}/{$requiredEndDate}");

        return $stores;
    }

    /**
     * Get a list of ISV app disconnected stores boarded for the given date range.
     * ISV can use this API call to retrieve all stores and info disconnected on given date range for the integrated app,
     * so that it can automate its own removal process.
     *
     * @param int $requiredBeginDate
     * @param int $requiredEndDate
     * @return mixed
     * @throws Exceptions\AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetchDisconnectedStores(int $requiredBeginDate, int $requiredEndDate)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $stores = $httpClient->get("$version/boarding/disconnected/{$requiredBeginDate}/{$requiredEndDate}");

        return $stores;
    }
}
