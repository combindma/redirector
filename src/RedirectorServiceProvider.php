<?php

namespace Combindma\Redirector;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RedirectorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('redirector')
            ->hasConfigFile('missing-page-redirector')
            ->hasViews()
            ->hasMigration('create_redirector_table');
    }
}
