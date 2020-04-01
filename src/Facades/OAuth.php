<?php

namespace Mikemartin\Bitlynx\Facades;

use Mikemartin\Bitlynx\OAuth\Manager;
use Illuminate\Support\Facades\Facade;

class OAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Manager::class;
    }
}
