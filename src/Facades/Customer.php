<?php

namespace Gyvex\MaakEenFactuur\Facades;

use Illuminate\Support\Facades\Facade;
use Gyvex\MaakEenFactuur\Popo\CustomerPopo;

/**
 * @method static CustomerPopo[]|array all()
 * @method static CustomerPopo create(array $data)
 * @method static CustomerPopo find(int $customerId)
 *
 * @see \Gyvex\MaakEenFactuur\Services\CustomerService
 */
class Customer extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'customer';
    }
}
