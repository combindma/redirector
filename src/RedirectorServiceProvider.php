<?php

namespace Combindma\Redirector;

use Combindma\Redirector\Commands\RedirectorCommand;
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_redirector_table')
            ->hasCommand(RedirectorCommand::class);
    }
}
