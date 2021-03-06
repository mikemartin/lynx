<?php

namespace Statamic\Addons\Lynx;

use Statamic\Extend\Modifier;

class LynxModifier extends Modifier
{

    /**
     * Shorten URL with Bit.ly API
     *
     * @author Mike Martin
     * @param  string $url
     * @return string
     */
    public function index($url)
    {
      // Do nothing if we aren't supposed to run in this environment.
      if (! $this->environmentWhitelisted()) {
        return $url;
      }

      if ($this->storage->get($url) != null) {
        $short_url = $this->storage->get($url);
      } else {
        $bitly = 'https://api-ssl.bitly.com/v3/shorten?longUrl='.$url.'&access_token='.$this->getConfig('api_key').'&format=json';
        $json = @json_decode(file_get_contents($bitly), true);
        $short_url = $json['data']['url'];

        $this->storage->put($url,$short_url);
      }
      return $short_url;
    }

    /**
     * Is the current environment whitelisted?
     *
     * @return bool
     */
    private function environmentWhitelisted()
    {
        return in_array(app()->environment(), $this->getConfig('environments', []));
    }
}
