<?php

namespace OnyxTech\PayebizGateway\Facades;

use Illuminate\Support\Facades\Facade;

class PayebizGateway extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'payebizgateway';
    }
}
