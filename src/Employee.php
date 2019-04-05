<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Employee
 * @package Guesl\Clover\Models\Employee
 */
class Employee extends Clover
{
    /**
     * Create an employee.
     *
     * @param array $employeeData
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create($employeeData = [])
    {
        $httpClient = self::getHttpClient();
        $merchantId = self::getMerchantId();
        $version = self::VERSION;

        $employee = $httpClient->post("$version/merchants/$merchantId/employees", [
            'json' => $employeeData,
        ]);

        return $employee;
    }

    /**
     * Update an employee info.
     *
     * @param $employeeId
     * @param array $employeeData
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function update($employeeId, $employeeData = [])
    {
        $httpClient = self::getHttpClient();
        $merchantId = self::getMerchantId();
        $version = self::VERSION;

        $employee = $httpClient->post("$version/merchants/$merchantId/employees/$employeeId", [
            'json' => $employeeData,
        ]);

        return $employee;
    }

    /**
     * Retrieve an employee.
     *
     * @param $employeeId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function retrieve($employeeId)
    {
        $httpClient = self::getHttpClient();
        $merchantId = self::getMerchantId();
        $version = self::VERSION;

        $employee = $httpClient->get("$version/merchants/$merchantId/employees/$employeeId");

        return $employee;
    }

    /**
     * Fetch all employees.
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch()
    {
        $httpClient = self::getHttpClient();
        $merchantId = self::getMerchantId();
        $version = self::VERSION;

        $employees = $httpClient->get("$version/merchants/$merchantId/employees");

        return $employees;
    }


    /**
     * Delete an employee.
     *
     * @param $employeeId
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function delete($employeeId)
    {
        $httpClient = self::getHttpClient();
        $merchantId = self::getMerchantId();
        $version = self::VERSION;

        $result = $httpClient->delete("$version/merchants/$merchantId/employees/$employeeId");

        return $result;
    }
}
