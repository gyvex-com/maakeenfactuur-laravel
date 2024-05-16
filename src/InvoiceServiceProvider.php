<?php

namespace Gyvex\MaakEenFactuur;

use Gyvex\MaakEenFactuur\Services\CustomerService;
use Gyvex\MaakEenFactuur\Services\InvoiceService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class InvoiceServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('maakeenfactuur')
            ->hasConfigFile();

        $this->app->singleton('invoice', function () {
            return new InvoiceService();
        });

        $this->app->singleton('customer', function () {
            return new CustomerService();
        });
    }
}
