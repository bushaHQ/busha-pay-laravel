<?php

namespace Busha\BushaPay;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Busha\BushaPay\Skeleton\SkeletonClass
 */
class BushaPayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bushapay';
    }
}
