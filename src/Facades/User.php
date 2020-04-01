<?php

namespace Mikemartin\Bitlynx\Facades;

use Illuminate\Support\Facades\Facade;
use Statamic\Contracts\Auth\UserRepository;

class User extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRepository::class;
    }
}
