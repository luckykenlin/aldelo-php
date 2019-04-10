<?php

namespace Luckykenlin\Aldelo;

use GuzzleHttp\Client;
use Luckykenlin\Aldelo\Exceptions\AldeloException;

/**
 * Class HttpClient
 * @package Luckykenlin\Aldelo
 */
class HttpClient
{
    /**
     * Single instance.
     *
     * @var $instance
     */
    private static $instance;
    /**
     * GuzzleHttp
     *
     * @var Client $httpClient
     */
    protected $httpClient;
    /**
     * Http options.
     *
     * @var array options
     */
    protected $options;

    /**
     * HttpClient constructor.
     *
     * @param string|null $baseUri
     * @param array $options
     */
    protected function __construct($baseUri = null, array $options = [])
    {
        $options = array_merge($options, ["base_uri" => $baseUri]);
        $this->options = $options;
    }

    /**
     * @param mixed $instance
     */
    public static function setInstance($instance): void
    {
        self::$instance = $instance;
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * Get a instance of the Guzzle HTTP client.
     *
     * @return Client
     */
    protected function getHttpClient()
    {
        if (isset($this->options)) {
            $this->httpClient = new Client($this->options);
        } else {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    /**
     * Get the default options for an HTTP request.
     *
     * @return array
     */
    protected function getRequestOptions()
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
            ],
        ];
    }

    /**
     * Execute the http request by guzzleHttp.
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws AldeloException
     */
    public function execute(string $method, string $url, array $options = [])
    {
        $requestOptions = $this->getRequestOptions();
        if (!empty($this->options)) {
            $requestOptions = array_merge($requestOptions, $this->options);
        }
        $requestOptions = array_merge($requestOptions, $options);
        $response = $this->getHttpClient()->request($method, $url, $requestOptions);
        $result = json_decode($response->getBody(), true);
        if (array_key_exists('err_code', $result) && (int)$result['err_code'] !== 0) {
            throw new AldeloException($result['err_msg'], 422);
        }
        return $result;
    }

    /**
     * Get request to the url.
     *
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws AldeloException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $url, array $options = [])
    {
        return $this->execute("GET", $url, $options);
    }

    /**
     * Post request the url.
     *
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws AldeloException
     */
    public function post(string $url = null, array $options = [])
    {
        return $this->execute("POST", $url, $options);
    }

    /**
     * Post request the url.
     *
     * @param string $url
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws AldeloException
     */
    public function put(string $url = null, array $options = [])
    {
        return $this->execute("PUT", $url, $options);
    }

    /**
     * Delete
     *
     * @param string|null $url
     * @param array $options
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws AldeloException
     */
    public function delete(string $url = null, array $options = [])
    {
        return $this->execute('DELETE', $url, $options);
    }

    /**
     * Get http client instance.
     *
     * @param string $baseUrl
     * @param array $options
     * @return HttpClient
     */
    public static function getInstance(string $baseUrl = null, array $options = [])
    {
        if (static::$instance) {
            return static::$instance;
        } else {
            return new HttpClient($baseUrl, $options);
        }
    }
}