<?php

namespace Arthurmelikyan\Quizable\Facades;

use Illuminate\Support\Facades\Facade;

class Quizable extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'quizable';
    }
}
