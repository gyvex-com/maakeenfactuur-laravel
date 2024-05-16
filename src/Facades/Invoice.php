<?php

namespace Gyvex\MaakEenFactuur\Facades;

use Illuminate\Support\Facades\Facade;
use Gyvex\MaakEenFactuur\Popo\InvoicePopo;

/**
 * @method static InvoicePopo[]|array all()
 * @method static InvoicePopo create(array $data)
 * @method static InvoicePopo update(int $invoiceId, array $data)
 * @method static InvoicePopo find(int $invoiceId)
 *
 * @see \Gyvex\MaakEenFactuur\Services\InvoiceService
 */
class Invoice extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'invoice';
    }
}
