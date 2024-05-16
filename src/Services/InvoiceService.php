<?php

namespace Gyvex\MaakEenFactuur\Services;

use Scrumble\Popo\BasePopo;
use Illuminate\Support\Collection;
use Illuminate\Http\Client\Response;
use Gyvex\MaakEenFactuur\Popo\InvoicePopo;
use Gyvex\MaakEenFactuur\Exception\ApiErrorException;

class InvoiceService
{
    /**
     * @param array $data
     * @return InvoicePopo
     * @throws ApiErrorException
     */
    public static function create(array $data): InvoicePopo
    {
        $response = ApiService::post('/invoice/store', $data);

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @param int $invoiceId
     * @param array $data
     * @return InvoicePopo
     * @throws ApiErrorException
     */
    public static function update(int $invoiceId, array $data): InvoicePopo
    {
        $response = ApiService::put("/invoice/{$invoiceId}/update", $data);

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @return Collection<int, InvoicePopo>
     * @throws ApiErrorException
     */
    public static function all(): Collection
    {
        $response = ApiService::get('/invoices');

        return static::parseResponseToPopoArray($response, InvoicePopo::class);
    }

    /**
     * @param int $invoiceId
     * @return InvoicePopo
     * @throws ApiErrorException
     */
    public static function find(int $invoiceId): InvoicePopo
    {
        $response = ApiService::get("/invoice/{$invoiceId}");

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @param Response $response
     * @param string $popoClass
     * @return InvoicePopo
     */
    protected static function parseResponseToPopo(Response $response, string $popoClass): InvoicePopo
    {
        $responseData = $response->json();
        return new $popoClass($responseData);
    }

    /**
     * @param Response $response
     * @param string $popoClass
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
