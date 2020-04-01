<?php

namespace Mikemartin\Bitlynx\Http\Controllers;

use Statamic\Facades\Site;
use Statamic\Facades\File;
use Statamic\Facades\Folder;
use Statamic\Facades\YAML;
use Statamic\Support\Str;
use Illuminate\Support\Carbon;

class BitlynxController {

    public function __invoke() {

        $site_url = Site::current()->absoluteUrl();

        $links = $this->links()
            ->map(function ($link) use ($site_url) {
                return [
                    'id' => $link['id'],
                    'title' => $link['title'],
                    'url' => $link['url'],
                    'link' => $link['link'],
                    'back_half' => Str::removeLeft($link['link'],'https://bit.ly/'),
                    'created_at' => Carbon::parse($link['created_at'])->format('Y/m/d')
                ];
            })
            ->values();


        return view('bitlynx::links.index',compact('links'));
    }

    public function links()
    {
        $links = collect();
        $path = storage_path('statamic/addons/bitlynx');
                
        foreach (Folder::getFilesByType($path, 'yaml') as $file) {
            $content = YAML::parse(File::get($file));
            $content['id'] = pathinfo($file)['filename'];
            $links->push($content);
        }
        
        return $links;
    }

    private function sortByDate($links) {
        return $links->sortBy('created_at');
    }
}