<?php

namespace Combindma\Redirector;

use Combindma\Redirector\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RedirectorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('redirector')
            ->hasConfigFile('missing-page-redirector')
            ->hasViews()
            ->hasMigration('create_redirects_table')
            ->hasTranslations();
    }

    public function packageRegistered()
    {
        Route::macro('redirector', function (string $baseUrl = 'admin') {
            Route::group(['prefix' => $baseUrl, 'as' => 'redirector::'], function () {
                Route::resource('/redirects', RedirectController::class)->except(['show']);
            });
        });
    }
}
