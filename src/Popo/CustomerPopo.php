<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class CustomerPopo extends BasePopo
{
    public int $id;

    public string $name;

    public string $email;

    public ?string $phone;

    public ?string $company_name;

    public ?string $vat_number;

    public ?string $billing_address;

    public ?string $zip_code;

    public ?string $city;

    public ?string $country;
}
