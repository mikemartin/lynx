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
      if ($this->cache->exists($url)) {
        $short_url = $this->cache->get($url);
      } else {
        $bitly = 'https://api-ssl.bitly.com/v3/shorten?longUrl='.$url.'&access_token='.$this->getConfig('api_key').'&format=json';
        $json = @json_decode(file_get_contents($bitly), true);
        $short_url = $json['data']['url'];

        $this->cache->put($url,$short_url);
      }
      return $short_url;
    }
}
