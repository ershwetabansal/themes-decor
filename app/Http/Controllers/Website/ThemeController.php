<?php

namespace App\Http\Controllers\Website;

use App\Theme;
use Illuminate\Http\Request;
use App\DiskBrowser\DiskBrowser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ThemeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->path = '/themes/';
    }

    /**
     * Show the requested theme.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = [];

        $data = Cache::rememberForever('themes', function () use($slug) {
            $data['theme'] = Theme::where('slug', $slug)->firstOrFail();

            $data['images'] = $this->browser->listFilesIn($this->path . $slug);
            return $data;
        });

        extract($data);
        
        return view('app.themes.show', compact('theme', 'images'));
    }
}
