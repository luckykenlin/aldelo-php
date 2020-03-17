<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
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
     * Fetch employees.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testFetchTest()
    {
        $this->setUpEnv();
        $query = [];
        $employees = Employee::fetch($query);
        $this->assertNotNull($employees);
    }

    /**
     * Create employee.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testCreateTest()
    {
        $this->setUpEnv();
        $data = [
            "FirstName" => "EzOrderNow",
            "LastName" => "M",
            "JobTitle" => "Online order"
        ];
        $employee = Employee::create($data);
        $this->assertNotNull($employee);
    }

    /**
     * Retrieve employee.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testRetrieveTest()
    {
        $this->setUpEnv();
        $employeeId = 1000000000000000001;
        $employee = Employee::retrieve($employeeId);
        $this->assertNotNull($employee);
    }

    /**
     * Update employee.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Luckykenlin\Aldelo\Exceptions\AldeloException
     */
    public function testUpdateTest()
    {
        $this->setUpEnv();
        $employeeId = 1000000000000000001;
        $employee = Employee::retrieve($employeeId);
        $data = [
            "EmployeeID" => $employee['EmployeeID'],
            "FirstName" => "EzOrderNow11",
            "LastName" => "D",
            "JobTitle" => "Online order",
            "DataSignature" => $employee['DataSignature']
        ];
        $result = Employee::update($data);
        $this->assertEquals(0, $result['err_code']);
    }

}
