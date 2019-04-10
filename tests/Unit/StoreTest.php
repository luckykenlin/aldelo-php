<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Store;
use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId('D-190329-0002');
        Aldelo::setIsvKey('1cf35aac-be87-455b-815a-d2e04963f66d');
        Aldelo::setAppKey('90326b57-a7d2-41cb-ad2a-82f1243d1b24');
        Aldelo::setAppVersion('0.0.0.0');
        Aldelo::setStoreSubId('2437-F8BA');
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
