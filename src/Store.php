<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Store
 * @package Luckykenlin\Aldelo\Store
 */
class Store extends Aldelo
{
    /**
     * Get just the store's information rather than the whole setup data of the store.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function retrieve()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $store = $httpClient->get("$version/store");

        return $store;
    }
}
