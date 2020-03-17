<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
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
     * Fetch customers.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $query = [];
        $customers = Customer::fetch($query);
        $this->assertNotNull($customers);
    }

    /**
     * Create customer.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testCreateTest()
    {
        $this->setUpEnv();
        $data = [
            "CustomerName" => "xuQQ",
            "Telephone" => "18601399451",
            "Email" => "xuqq@aldelo.com",
            "Address" => null,
            "CrossStreet" => null,
            "City" => null,
            "State" => null,
            "PostalCode" => null,
            "AnniversaryMonth" => null,
            "BirthMonth" => null,
            "VIPType" => null,
            "Barcode" => null,
            "Notes" => null
        ];
        $customer = Customer::create($data);
        $this->assertNotNull($customer);
    }

    /**
     * Retrieve customer.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $customerId = 1000000000000000001;
        $customer = Customer::retrieve($customerId);
        $this->assertNotNull($customer);
    }

    /**
     * Update customer.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testUpdateTest()
    {
        $this->setUpEnv();
        $customerId = 1000000000000000001;
        $customer = Customer::retrieve($customerId);
        $data = [
            "CustomerID" => $customerId,
            "CustomerName" => "xuQQ111",
            "Telephone" => "18601399451",
            "Email" => "xuqq@aldelo.com",
            "Address" => null,
            "CrossStreet" => null,
            "City" => null,
            "State" => null,
            "PostalCode" => null,
            "AnniversaryMonth" => null,
            "BirthMonth" => null,
            "VIPType" => null,
            "Barcode" => null,
            "Notes" => null,
            "DataSignature" => $customer['DataSignature']
        ];
        $result = Customer::update($data);
        $this->assertEquals(0, $result['err_code']);
    }

}
