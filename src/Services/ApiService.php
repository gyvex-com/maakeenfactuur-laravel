<?php

namespace Gyvex\MaakEenFactuur\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Gyvex\MaakEenFactuur\Exception\ApiErrorException;

class ApiService
{
    /**
     * @var string | null
     */
    protected static ?string $apiKey;

    /**
     * @var string|null
     */
    protected static ?string $host = 'https://maakeenfactuur.nl/api';

    /**
     * @param string|null $apiKey
     * @return void
     */
    public static function setApiKey(?string $apiKey): void
    {
        static::$apiKey = $apiKey;
    }

    /**
     * @param string $host
     * @return void
     */
    public static function setHost(string $host): void
    {
        self::$host = $host;
    }

    /**
     * @param string $url
     * @param array $params
     * @return mixed
     * @throws ApiErrorException
     */
    public static function get(string $url, array $params = []): mixed
    {
        return static::request('get', $url, $params);
    }

    /**
     * @param string $url
     * @param array $params
     * @return mixed
     * @throws ApiErrorException
     */
    public static function post(string $url, array $params = []): mixed
    {
        return static::request('post', $url, $params);
    }

    /**
     * @param string $url
     * @param array $params
     * @return mixed
     * @throws ApiErrorException
     */
    public static function put(string $url, array $params = []): mixed
    {
        return static::request('put', $url, $params);
    }

    /**
     * @param string $method
     * @param $url
     * @param array $params
     * @return mixed
     * @throws ApiErrorException
     */
    protected static function request(string $method, $url, array $params = []): Response
    {
        $params['api_token'] = static::$apiKey;

        /** @var Response $response */
        $response = Http::$method($url, $params);

        if ($response->getStatusCode() === 422) {
            throw new ApiErrorException($response);
        }

        return $response;
    }
}
