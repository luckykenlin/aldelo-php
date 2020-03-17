<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Boarding;
use PHPUnit\Framework\TestCase;

class BoardingTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId('D-181207-0001');
        Aldelo::setIsvKey('480a31cb-03e6-4718-9e16-2d7a27e7af8f');
        Aldelo::setAppKey('6eeeccfb-dd19-41a3-b2fa-a15586c23e64');
        Aldelo::setAppVersion('1.0.0.0');
        Aldelo::setStoreSubId('2296-1C2A');
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
