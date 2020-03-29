<?php

namespace Mikemartin\Bitlynx\Modifiers;

use Shivella\Bitly\Facade\Bitly;
use Statamic\Modifiers\Modifier;

class Bitlynx extends Modifier
{
    /**
     * Modify a value.
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function index($value, $params, $context)
    {
        $url = Bitly::getUrl($value);
        return $url;
    }
}

