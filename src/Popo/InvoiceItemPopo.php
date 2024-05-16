<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class InvoiceItemPopo extends BasePopo
{
    public int $id;

    public string $description;

    public float $quantity;

    public float $unit_price;

    public float $total;

    public float $vat_percentage;
}
