<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Group
 * @package Luckykenlin\Aldelo\Group
 */
class Group extends Aldelo
{
    /**
     * Get the active product group's information based on group ID.
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

        $group = $httpClient->get("$version/group/{$id}");

        return $group;
    }

    /**
     * Get an active list of product groups from the connected store.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $groups = $httpClient->get("$version/groupList");

        return $groups;
    }
}
