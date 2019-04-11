<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Employee
 * @package Luckykenlin\Aldelo\Employee
 */
class Employee extends Aldelo
{
    /**
     * Add new employee into store. This api is used for employee.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function create(array $data = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employee = $httpClient->post("$version/employee", [
            'json' => $data,
        ]);

        return $employee;
    }

    /**
     * Update an existing employee record.
     *
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function update(array $data = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employee = $httpClient->put("$version/employee", [
            'json' => $data,
        ]);

        return $employee;
    }

    /**
     * Get active employee's information based on employee ID.
     *
     * @param $id
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function retrieve(int $id)
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employee = $httpClient->get("$version/employee/{$id}");

        return $employee;
    }

    /**
     * Get an active list of employees with basic information.
     *
     * @param array $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exceptions\AldeloException
     */
    public static function fetch(array $query = [])
    {
        $httpClient = self::getHttpClient();
        $version = self::VERSION;

        $employees = $httpClient->get("$version/employeeList", [
            'query' => $query
        ]);

        return $employees;
    }
}
