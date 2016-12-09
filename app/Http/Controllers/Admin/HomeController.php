<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\PageType;
use App\Theme;
use App\Offer;
use App\Product;
use App\Service;
use App\Package;
use App\Configuration;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$themes = Theme::orderBy('created_at', 'desc')->get();
    	$offers = Offer::orderBy('created_at', 'desc')->get();
        $packages = Package::orderBy('created_at', 'desc')->get();
    	$products = Product::orderBy('created_at', 'desc')->get();
    	$configurations = Configuration::orderBy('created_at', 'desc')->get();
    	$services = Service::orderBy('created_at', 'desc')->get();
    	$pages = Page::orderBy('created_at', 'desc')->with('pageType')->get();
    	$pageTypes = PageType::orderBy('created_at', 'desc')->get();

        return view('admin', compact('themes', 'products', 'offers', 'configurations', 'services',
            'pages', 'pageTypes', 'packages'));
    }

}
