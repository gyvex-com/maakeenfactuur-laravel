<?php

namespace Gyvex\MaakEenFactuur\Facades;

use Illuminate\Support\Facades\Facade;

class Invoice extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'invoice';
    }
}
