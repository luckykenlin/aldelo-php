<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Boarding;
use PHPUnit\Framework\TestCase;

class BoardingTest extends TestCase
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
     * Fetch discounts.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchConnectedStoresTest()
    {
        $this->setUpEnv();
        $requiredBeginDate = 20190330;
        $requiredEndDate = 20190410;
        $stores = Boarding::fetchConnectedStores($requiredBeginDate, $requiredEndDate);
        $this->assertNotNull($stores);
    }

    /**
     * Retrieve discount.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $requiredBeginDate = 20190330;
        $requiredEndDate = 20190410;
        $stores = Boarding::fetchDisconnectedStores($requiredBeginDate, $requiredEndDate);
        $this->assertNotNull($stores);
    }
}
