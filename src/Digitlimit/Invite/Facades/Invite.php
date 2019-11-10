<?php

namespace Digitlimit\Invite\Facades;
use Illuminate\Support\Facades\Facade;
use Digitlimit\Invite\Contracts\Factory;

class Invite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}