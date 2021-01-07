<?php

namespace Fused\Extend;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fused\Extend\Extend
 */
class ExtendFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'extend';
    }
}
