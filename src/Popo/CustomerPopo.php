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
}
