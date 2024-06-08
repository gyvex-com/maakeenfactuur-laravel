<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class InvoicePopo extends BasePopo
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var int
     */
    public int $user_id;

    /**
     * @var string
     */
    public string $invoice_number;

    /**
     * @var string
     */
    public string $date;

    /**
     * @var string
     */
    public string $due_date;

    /**
     * @var float
     */
    public float $total_amount;

    /**
     * @var string
     */
    public string $status;

    /**
     * @var array<InvoiceItemPopo>|null
     */
    public ?array $items;
}
