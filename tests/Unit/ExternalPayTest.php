<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\ExternalPay;
use PHPUnit\Framework\TestCase;

class ExternalPayTest extends TestCase
{
    public function setUpEnv()
    {
        Aldelo::setIsvId(env("ALDELO_ISV_ID", 'D-181207-0001'));
        Aldelo::setIsvKey(env("ALDELO_ISV_KEY", '480a31cb-03e6-4718-9e16-2d7a27e7af8f'));
        Aldelo::setAppKey(env("ALDELO_APP_KEY", '6eeeccfb-dd19-41a3-b2fa-a15586c23e64'));
        Aldelo::setAppVersion(env("ALDELO_APP_VERSION", '1.0.0.0'));
        Aldelo::setStoreSubId(env("ALDELO_STORE_SUB_ID", '2296-1C2A'));
        Aldelo::setStoreSubId(env("ALDELO_STORE_APP_TOKEN", '72ce5c21-9885-4de8-9f07-7dcc3202e83a'));
    }

    /**
     * Create external pay.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testCreateTest()
    {
        $this->setUpEnv();
        $externalPay = ExternalPay::retrieve(1000000000000000001)[0];
        $data = [
            "CashierID" => $externalPay['CashierID'],
            "EmployeeID" => 1000000000000000001,
            "OrderID" => 1000999000000000006,
            "ExternalTenderID   " => $externalPay['ExternalTenderID'],
            "PaymentAmount" => 20.1,
            "TipIncluded" => 0,
            "PaymentRefNumber" => 0,
        ];
        $externalPay = ExternalPay::create($data);
        $this->assertNotNull($externalPay);
    }

    /**
     * Retrieve external pay
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $externalPay = ExternalPay::retrieve(1000000000000000001);
        $this->assertNotNull($externalPay);
        $this->assertArrayNotHasKey('err_code', $externalPay);
    }

    /**
     * Delete external pay.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testVoidTest()
    {
        $this->setUpEnv();
        $result = ExternalPay::void(1000000000000000001);
        $this->assertNotEmpty($result);
        $this->assertEquals(0, $result['err_code']);
    }
}
