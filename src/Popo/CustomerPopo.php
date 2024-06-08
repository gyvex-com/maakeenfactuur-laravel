<?php

namespace Gyvex\MaakEenFactuur\Popo;

use Scrumble\Popo\BasePopo;

class CustomerPopo extends BasePopo
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string|null
     */
    public ?string $phone;

    /**
     * @var string|null
     */
    public ?string $company_name;

    /**
     * @var string|null
     */
    public ?string $vat_number;

    /**
     * @var string|null
     */
    public ?string $billing_address;

    /**
     * @var string|null
     */
    public ?string $zip_code;

    /**
     * @var string|null
     */
    public ?string $city;

    /**
     * @var string|null
     */
    public ?string $country;

    /**
     * @param array $jsonData
     */
    public function __construct(array $jsonData) {
        $this->id = $jsonData['id'];
        $this->email = $jsonData['email'];
        $this->name = $jsonData['name'];
        $this->phone = array_key_exists('phone', $jsonData) ? $jsonData['phone'] : '';
        $this->company_name = array_key_exists('company_name', $jsonData) ? $jsonData['company_name'] : '';
        $this->vat_number = array_key_exists('vat_number', $jsonData) ? $jsonData['vat_number'] : '';
        $this->zip_code = array_key_exists('zip_code', $jsonData) ? $jsonData['zip_code'] : '';
    }
}
