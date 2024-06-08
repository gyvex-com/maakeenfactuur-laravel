<?php

namespace Gyvex\MaakEenFactuur\Services;

use Gyvex\MaakEenFactuur\Exception\ApiErrorException;
use Gyvex\MaakEenFactuur\Facades\Customer;
use Gyvex\MaakEenFactuur\Popo\CustomerPopo;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Scrumble\Popo\BasePopo;

class CustomerService
{
    /**
     * @return Collection<int, Customer>
     *
     * @throws ApiErrorException
     */
    public static function all(): Collection
    {
        $response = ApiService::get('/customers');

        return static::parseResponseToPopoArray($response, CustomerPopo::class);
    }

    /**
     * @throws ApiErrorException
     */
    public static function create(array $data): CustomerPopo
    {
        $response = ApiService::post('/customer/store', $data);

        return static::parseResponseToPopo($response, CustomerPopo::class);
    }

    /**
     * @throws ApiErrorException
     */
    public static function find(int $customerId): CustomerPopo
    {
        $response = ApiService::get("/customers/{$customerId}");

        return static::parseResponseToPopo($response, CustomerPopo::class);
    }

    protected static function parseResponseToPopo(Response $response, string $popoClass): CustomerPopo
    {
        /** @var array<string, mixed> $responseData */
        $responseData = $response->json();

        return new $popoClass($responseData);
    }

    /**
     * @return Collection<int, BasePopo>
     */
    protected static function parseResponseToPopoArray(Response $response, string $popoClass): Collection
    {
        $responseData = $response->json();
        $popos = Collection::make();

        foreach ($responseData as $data) {
            $popos->add(new $popoClass($data));
        }

        return $popos;
    }
}
