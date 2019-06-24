<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Storage
 * @package Luckykenlin\Aldelo\Storage
 */
class Storage extends Aldelo
{
    /**
     * Get active employee's information based on employee ID.
     *
     * @param $fileName
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function retrieve(string $fileName)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $file = $httpClient->get("$version/storage/{$fileName}");

        return $file;
    }
}
