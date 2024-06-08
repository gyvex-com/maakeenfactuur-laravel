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

    public function __construct(array $jsonData)
    {
        $this->id = $jsonData['id'];
        $this->email = $jsonData['email'];
        $this->name = $jsonData['name'];
        $this->phone = array_key_exists('phone', $jsonData) ? $jsonData['phone'] : '';
        $this->company_name = array_key_exists('company_name', $jsonData) ? $jsonData['company_name'] : '';
        $this->vat_number = array_key_exists('vat_number', $jsonData) ? $jsonData['vat_number'] : '';
        $this->zip_code = array_key_exists('zip_code', $jsonData) ? $jsonData['zip_code'] : '';
    }
}
