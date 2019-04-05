<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Employee
 * @package Guesl\Clover\Models\Employee
 */
class Employee extends Aldelo
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
        $version = self::VERSION;

        $employee = $httpClient->post("$version/employee", [
            'json' => $employeeData,
        ]);

        return $employee;
    }

    /**
     * Update an employee info.
     *
     * @param array $employeeData
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function update($employeeData = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employee = $httpClient->put("$version/employee", [
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
        $version = self::VERSION;

        $employee = $httpClient->get("$version/employee/$employeeId");

        return $employee;
    }

    /**
     * Fetch all employees.
     *
     * @param array $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function fetch(array $query)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employees = $httpClient->get("$version/employeeList", [
            'query' => $query
        ]);

        return $employees;
    }
}
