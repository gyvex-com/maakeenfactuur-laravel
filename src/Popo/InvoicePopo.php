<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class InvoicePopo extends BasePopo
{
    public int $id;

    public int $user_id;

    public string $invoice_number;

    public string $date;

    public string $due_date;

    public float $total_amount;

    public string $status;

    /**
     * @var array<InvoiceItemPopo>|null
     */
    public ?array $items;
}
