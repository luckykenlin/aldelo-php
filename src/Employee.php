<?php

namespace Luckykenlin\Aldelo;

/**
 * Class Employee
 * @package Luckykenlin\Aldelo\Employee
 */
class Employee extends Aldelo
{
    /**
     * Create an employee.
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
     * Update an employee info.
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
     * Retrieve an employee.
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
     * Fetch all employees.
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
