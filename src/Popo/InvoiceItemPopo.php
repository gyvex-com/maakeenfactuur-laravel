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

    public function __construct(
        int $id,
        string $description,
        float $quantity,
        float $unit_price,
        float $total,
        float $vat_percentage,
    ) {
        $this->id = $id;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;
        $this->total = $total;
        $this->vat_percentage = $vat_percentage;
    }
}
