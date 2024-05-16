<?php

namespace Gyvex\MaakEenFactuur;

use Spatie\LaravelPackageTools\Package;
use Gyvex\MaakEenFactuur\Services\ApiService;
use Gyvex\MaakEenFactuur\Services\InvoiceService;
use Gyvex\MaakEenFactuur\Services\CustomerService;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class InvoiceServiceProvider extends PackageServiceProvider
{
    /**
     * @param Package $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('maakeenfactuur')
            ->hasConfigFile();

        if (config('maakeenfactuur.api_key')) {
            ApiService::setApiKey(config('maakeenfactuur.api_key'));
        }

        $this->app->singleton('invoice', function () {
            return new InvoiceService();
        });

        $this->app->singleton('customer', function () {
            return new CustomerService();
        });
    }
}
