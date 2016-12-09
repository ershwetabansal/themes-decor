<?php

namespace App\Http\Controllers\Website;

use App\Product;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data = Cache::rememberForever('homepage', function () {
            $data['images'] = $this->browser->listAllFilesIn('/themes/');
            $data['products'] = Product::orderBy('created_at', 'desc')->limit(10)->get();
            $data['products']->map(function ($product) {
               $product->images =   $this->browser->listAllFilesIn('/products/' . $product->slug);
            });
            $data['servicesWithImages'] = Service::orderBy('created_at', 'desc')->limit(10)->get();
            $data['servicesWithImages']->map(function ($service) {
                $service->images =   $this->browser->listAllFilesIn('/services/' . $service->slug);
            });

            return $data;
        });

        extract($data);
        
        return view('home', compact('images', 'products', 'servicesWithImages'));
    }
}
