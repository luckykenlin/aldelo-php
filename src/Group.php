<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Group
 * @package Luckykenlin\Aldelo\Group
 */
class Group extends Aldelo
{
    /**
     * Retrieve an group.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $group = $httpClient->get("$version/group/{$id}");

        return $group;
    }

    /**
     * Fetch all groups.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $groups = $httpClient->get("$version/groupList");

        return $groups;
    }
}
