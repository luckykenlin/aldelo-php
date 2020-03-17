<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Surcharge;
use PHPUnit\Framework\TestCase;

class SurchargeTest extends TestCase
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
     * Fetch surcharges.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $surcharges = Surcharge::fetch();
        $this->assertNotNull($surcharges);
    }

    /**
     * Retrieve surcharge.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $surchargeId = 1000000000000000001;
        $surcharge = Surcharge::retrieve($surchargeId);
        $this->assertNotNull($surcharge);
    }
}
