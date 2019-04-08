<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Item
 * @package Luckykenlin\Aldelo\Item
 */
class Item extends Aldelo
{
    /**
     * Retrieve an Item.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $item = $httpClient->get("$version/item/{$id}");

        return $item;
    }

    /**
     * Fetch all items.
     *
     * @param int $groupId
     * @param array $query ex:['parentItemID' = 10000000000001]
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(int $groupId, array $query = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $items = $httpClient->get("$version/itemList/$groupId", [
            'query' => $query
        ]);

        return $items;
    }
}
