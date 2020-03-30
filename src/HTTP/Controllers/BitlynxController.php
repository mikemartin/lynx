<?php

namespace Mikemartin\Bitlynx\Http\Controllers;

use Statamic\Facades\File;
use Statamic\Facades\Folder;
use Statamic\Facades\YAML;
use Statamic\Facades\Helper;

class BitlynxController {

    public function index() {
        $links = $this->links();
        return view('bitlynx::links.index',compact('links'));
    }

    public function links()
    {
        $links = collect();
        $path = storage_path('statamic/addons/bitlynx');

        
        foreach (Folder::getFiles($path) as $file) {
            $link = collect(YAML::parse(File::get($file)))
                ->put('id',pathinfo($file)['filename'])->all();

            $links->push($link)->all();
        }
        
        return $links;
    }

    private function sortByDate($links) {
        return $links->sortBy('created_at');
    }
}