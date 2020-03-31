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