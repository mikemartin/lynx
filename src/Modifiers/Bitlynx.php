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

        // Get title from context
        if ($context['title']) {
            $title = $context['title']->raw();
        } else {
            $title = $long_url;
        }

        // Check if url was already shortened
        $path = storage_path('statamic/addons/bitlynx/'.md5($long_url).'.yaml');

        if (File::exists($path)) {
            $link = collect(YAML::parse(File::get($path)))->get('link');
        } else {

            $link = Bitly::getUrl($long_url);

            $data = array(
                "title" => $title,
                "url" => $long_url,
                "link" => $link,
                "created_at" => now()->timestamp
            );
            
            File::put($path, YAML::dump($data));
        }

        // Get the short URL
        return $link;
    }

}


