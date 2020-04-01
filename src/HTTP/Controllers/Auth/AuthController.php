<?php

namespace Mikemartin\Bitlynx\Http\Controllers\Auth;

use Mikemartin\Bitlynx\Facades\OAuth;
use Illuminate\Http\Request;
use Statamic\Http\Controllers\CP\CpController;

class AuthController extends CpController
{
    public function __invoke() {
        $data = [
            'title' => __('Connect Bitly account'),
            'oauth' => $enabled = OAuth::enabled(),
            'providers' => $enabled ? OAuth::providers() : [],
        ];

        return view('bitlynx::auth.index',$data);
    }
}
