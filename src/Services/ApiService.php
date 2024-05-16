<?php

namespace Gyvex\MaakEenFactuur\Services;

use Gyvex\MaakEenFactuur\Exception\ApiErrorException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ApiService
{
    /**
     * @throws ApiErrorException
     */
    public static function get(string $url, array $params = []): mixed
    {
        return static::request('get', $url, $params);
    }

    /**
     * @throws ApiErrorException
     */
    public static function post(string $url, array $params = []): mixed
    {
        return static::request('post', $url, $params);
    }

    /**
     * @throws ApiErrorException
     */
    public static function put(string $url, array $params = []): mixed
    {
        return static::request('put', $url, $params);
    }

    /**
     * @return mixed
     *
     * @throws ApiErrorException
     */
    protected static function request(string $method, $url, array $params = []): Response
    {
        $params['api_token'] = config('maakeenfactuur.api_key');
        $host = config('maakeenfactuur.host', 'https://maakeenfactuur.nl/api');

        /** @var Response $response */
        $response = Http::$method("$host$url", $params);

        if ($response->getStatusCode() === 422) {
            throw new ApiErrorException($response);
        }

        return $response;
    }
}
