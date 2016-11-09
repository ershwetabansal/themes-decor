<?php

namespace App\Http\Controllers\Admin;

use App\Theme;
use App\Offer;
use App\Product;
use App\Service;
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
    	$themes = Theme::orderBy('created_at', 'desc')->paginate();
    	$offers = Offer::orderBy('created_at', 'desc')->paginate();
    	$products = Product::orderBy('created_at', 'desc')->paginate();
    	$configurations = Configuration::orderBy('created_at', 'desc')->paginate();
    	$services = Service::orderBy('created_at', 'desc')->paginate();
    	
        return view('admin', compact('themes', 'products', 'offers', 'configurations', 'services'));
    }

}
