<?php

namespace Combindma\Redirector;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Combindma\Redirector\Redirector
 */
class RedirectorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redirector';
    }
}
