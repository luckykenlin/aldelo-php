<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Aldelo
 * @package Luckykenlin\Aldelo
 */
class Aldelo
{
    /**
     * Sandbox api url.
     */
    const SANDBOX_URL = 'https://sandbox.aldelo.io/';

    /**
     * Production api url.
     */
    const PRODUCTION_URL = 'https://go.aldelo.io/';

    /**
     * @var
     */
    const VERSION = 'v1';

    /**
     * @var
     */
    protected static $baseUrl;

    /**
     * @var
     */
    private static $isvId;

    /**
     * @var
     */
    private static $isvKey;

    /**
     * @var
     */
    private static $appKey;

    /**
     * @var
     */
    private static $appVersion;

    /**
     * @var
     */
    private static $storeSubId;

    /**
     * @return mixed
     */
    public static function getStoreSubId()
    {
        return self::$storeSubId;
    }

    /**
     * @param mixed $storeSubId
     */
    public static function setStoreSubId($storeSubId): void
    {
        self::$storeSubId = $storeSubId;
    }

    /**
     * @return mixed
     */
    public static function getIsvId()
    {
        return self::$isvId;
    }

    /**
     * @param mixed $isvId
     */
    public static function setIsvId($isvId): void
    {
        self::$isvId = $isvId;
    }

    /**
     * @return mixed
     */
    public static function getIsvKey()
    {
        return self::$isvKey;
    }

    /**
     * @param mixed $isvKey
     */
    public static function setIsvKey($isvKey): void
    {
        self::$isvKey = $isvKey;
    }

    /**
     * @return mixed
     */
    public static function getAppKey()
    {
        return self::$appKey;
    }

    /**
     * @param mixed $appKey
     */
    public static function setAppKey($appKey): void
    {
        self::$appKey = $appKey;
    }

    /**
     * @return mixed
     */
    public static function getAppVersion()
    {
        return self::$appVersion;
    }

    /**
     * @param mixed $appVersion
     */
    public static function setAppVersion($appVersion): void
    {
        self::$appVersion = $appVersion;
    }

    /**
     * @return HttpClient
     */
    protected static function getHttpClient()
    {
        $client = HttpClient::getInstance(static::getBaseUrl(), [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'ISV-ID' => static::getIsvId(),
                'ISV-KEY' => static::getIsvKey(),
                'App-Key' => static::getAppKey(),
                'App-Version' => static::getAppVersion(),
                'Store-Sub-ID' => static::getStoreSubId(),
            ],
        ]);

        return $client;
    }

    /**
     * Get the base url basic on the env configuration.
     */
    public static function getBaseUrl()
    {
        $baseUrl = static::$baseUrl;
        if (!isset($baseUrl)) {
            $baseUrl = self::PRODUCTION_URL;
            if (env('APP_ENV') != 'production') {
                $baseUrl = self::SANDBOX_URL;
            }
        }

        return $baseUrl;
    }

    /**
     * @param $baseUrl
     */
    public static function setBaseUrl($baseUrl): void
    {
        self::$baseUrl = $baseUrl;
    }
}
