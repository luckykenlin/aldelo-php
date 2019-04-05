<?php

namespace Tests\Unit;

use Luckykenlin\Aldelo\Aldelo;
use Luckykenlin\Aldelo\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
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
     * Fetch employees.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testFetchEmployeesTest()
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
     */
    public function testCreateEmployeesTest()
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testRetrieveEmployeesTest()
    {
        $this->setUpEnv();
        $employee = Employee::retrieve(1000000000000000004);
        $this->assertNotNull($employee);
    }

    /**
     * Update employee.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testUpdateEmployeesTest()
    {
        $this->setUpEnv();
        $employee = Employee::retrieve(1000000000000000004);
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
