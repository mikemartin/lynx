<?php

namespace Mikemartin\Bitlynx\Modifiers;

use Illuminate\Support\Facades\Storage;
use Shivella\Bitly\Facade\Bitly;
use Statamic\Support\Str;
use Statamic\Modifiers\Modifier;
use Statamic\Facades\File;
use Statamic\Facades\YAML;

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

        // Is Bitly enabled on server?
        if (!config('bitly.enabled')) {
            return $value;
        }

        // Ensure value is a valid URL.
        if (Str::startsWith($value, 'http')) {
            $long_url = $value;
        } else {
            $long_url = $context['permalink'];
        }
        }

        // Check if url was already shortened
        $path = storage_path('statamic/addons/bitlynx/'.md5($long_url).'.yaml');

        if (File::exists($path)) {
            $short_url = collect(YAML::parse(File::get($path)))->get('url');
        } else {
            $short_url = Bitly::getUrl($long_url);

            $data = array(
                "title" => $long_url,
                "url" => $short_url,
                "created_at" => now()->timestamp
            );
            
            File::put($path, YAML::dump($data));
        }

        // Get the short URL
        return $short_url;
    }

}


