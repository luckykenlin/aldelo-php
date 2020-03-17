<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\ExternalPay;
use PHPUnit\Framework\TestCase;

class ExternalPayTest extends TestCase
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
