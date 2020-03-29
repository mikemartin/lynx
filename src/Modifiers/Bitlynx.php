<?php

namespace Mikemartin\Bitlynx\Modifiers;

use Bitly;
use Statamic\Modifiers\Modifier;

class Bitlynx extends Modifier
{
    /**
     * Shorten URL with Bit.ly API
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


