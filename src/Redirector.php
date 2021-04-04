<?php

namespace Combindma\Redirector;


use Combindma\Redirector\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

class Redirector
{
    public static function routes(string $prefix = 'dash')
    {
        Route::group(['prefix' => $prefix, 'as' => 'redirector::'], function (){
            Route::resource('/redirects', RedirectController::class)->except(['show']);
        });
    }
}
