<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Discount
 * @package Luckykenlin\Aldelo\Discount
 */
class Discount extends Aldelo
{
    /**
     * Get active discount details by discount ID.
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

        $discount = $httpClient->get("$version/discount/{$id}");

        return $discount;
    }

    /**
     * Get an active list of discounts.
     *
     * @return mixed
     * @throws Exceptions\AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $discounts = $httpClient->get("$version/discountList");

        return $discounts;
    }
}
