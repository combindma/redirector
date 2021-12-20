<?php

namespace Combindma\Redirector\Tests;

use Combindma\Redirector\Http\Controllers\RedirectController;
use Combindma\Redirector\RedirectorServiceProvider;
use Elegant\Sanitizer\Laravel\SanitizerServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Combindma\\Redirector\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
        //$this->withoutExceptionHandling();
    }

    protected function getPackageProviders($app)
    {
        return [
            RedirectorServiceProvider::class,
            SanitizerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //Schema::dropAllTables(); //run MYSQL server by this command: brew services start mysql

        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__ . '/../database/migrations/create_redirects_table.php.stub';
        (new \CreateRedirectsTable())->up();
    }

    protected function defineRoutes($router)
    {
        Route::group(['as' => 'redirector::', 'middleware' => ['bindings']], function () {
            Route::resource('/redirects', RedirectController::class)->except(['show']);
        });
    }
}
