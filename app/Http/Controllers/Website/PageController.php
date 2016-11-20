<?php

namespace App\Http\Controllers\Website;

use App\Page;
use App\PageType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->path = '/pages/';
    }

    /**
     * Show the requested page.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $pageType = PageType::where('id', $page->page_type_id)->first();

        $images = $this->browser->listFilesIn($this->path . $slug);

        if ($pageType) {
            $view = $pageType->template;
        } else {
            $view = 'app.pages.show';
        }

        return view($view, compact('page', 'images'));
    }
}
