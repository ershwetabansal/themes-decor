<?php

namespace App\Http\Controllers\Website;

use App\DiskBrowser\DiskBrowser;
use App\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $theme = Theme::where('slug', $slug)->firstOrFail();

        $images = $this->browser->listFilesIn($this->path . $slug);

        return view('app.themes.show', compact('theme', 'images'));
    }
}
