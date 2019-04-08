<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Store
 * @package Luckykenlin\Aldelo\Store
 */
class Store extends Aldelo
{
    /**
     * Retrieve an store.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $store = $httpClient->get("$version/store");

        return $store;
    }
}
