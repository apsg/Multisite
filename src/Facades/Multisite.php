<?php

namespace Apsg\Multisite\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Multisite.
 *
 * @static-method domain()
 */
class Multisite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'multisite';
    }
}
