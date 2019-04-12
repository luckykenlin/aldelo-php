<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Store;
use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId(env("ALDELO_ISV_ID", 'D-181207-0001'));
        Aldelo::setIsvKey(env("ALDELO_ISV_KEY", '480a31cb-03e6-4718-9e16-2d7a27e7af8f'));
        Aldelo::setAppKey(env("ALDELO_APP_KEY", '6eeeccfb-dd19-41a3-b2fa-a15586c23e64'));
        Aldelo::setAppVersion(env("ALDELO_APP_VERSION", '1.0.0.0'));
        Aldelo::setStoreSubId(env("ALDELO_STORE_SUB_ID", '2296-1C2A'));
    }

    /**
     * Retrieve store.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $store = Store::retrieve();
        $this->assertNotNull($store);
    }
}
