<?php

namespace App\Http\Controllers\Website;

use App\Product;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->browser->listAllFilesIn('/themes/');

        $products = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $products->map(function ($product) {
           $product->images =   $this->browser->listAllFilesIn('/products/' . $product->slug);
        });
        $servicesWithImages = Service::orderBy('created_at', 'desc')->limit(10)->get();
        $servicesWithImages->map(function ($service) {
            $service->images =   $this->browser->listAllFilesIn('/services/' . $service->slug);
        });
        return view('home', compact('images', 'products', 'servicesWithImages'));
    }
}
