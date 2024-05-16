<?php

namespace Gyvex\MaakEenFactuur\Facades;

use Gyvex\MaakEenFactuur\Popo\InvoicePopo;
use Illuminate\Support\Facades\Facade;

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
    protected static function getFacadeAccessor(): string
    {
        return 'invoice';
    }
}
