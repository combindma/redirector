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
            ->hasTranslations();
    }

    public function packageBooted()
    {
        if ($this->app->runningInConsole()) {
            // Export the migration
            if (! class_exists('CreateRedirectsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_redirects_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_redirects_table.php'),
                ], 'redirector-migrations');
            }
        }
    }
}
