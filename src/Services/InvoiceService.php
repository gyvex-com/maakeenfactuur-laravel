<?php

namespace Gyvex\MaakEenFactuur\Services;

use Gyvex\MaakEenFactuur\Exception\ApiErrorException;
use Gyvex\MaakEenFactuur\Popo\InvoicePopo;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Scrumble\Popo\BasePopo;

class InvoiceService
{
    /**
     * @throws ApiErrorException
     */
    public static function create(array $data): InvoicePopo
    {
        /** @var Response $response */
        $response = ApiService::post('/invoice/store', $data);

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @throws ApiErrorException
     */
    public static function update(int $invoiceId, array $data): InvoicePopo
    {
        $response = ApiService::put("/invoice/{$invoiceId}/update", $data);

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @return Collection<int, InvoicePopo>
     *
     * @throws ApiErrorException
     */
    public static function all(): Collection
    {
        $response = ApiService::get('/invoices');

        return static::parseResponseToPopoArray($response, InvoicePopo::class);
    }

    /**
     * @throws ApiErrorException
     */
    public static function find(int $invoiceId): InvoicePopo
    {
        $response = ApiService::get("/invoice/{$invoiceId}");

        return static::parseResponseToPopo($response, InvoicePopo::class);
    }

    /**
     * @param int $invoiceId
     * @return Response
     * @throws ApiErrorException
     */
    public static function pdf(int $invoiceId): Response
    {
        /** @var Response $response */
        $response = ApiService::get("/invoice/{$invoiceId}/pdf");

        return $response;
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
