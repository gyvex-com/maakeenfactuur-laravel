<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class InvoiceItemPopo extends BasePopo
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $description;

    /**
     * @var float
     */
    public float $quantity;

    /**
     * @var float
     */
    public float $unit_price;

    /**
     * @var float
     */
    public float $total;

    /**
     * @var float
     */
    public float $vat_percentage;
}
