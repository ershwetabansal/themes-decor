<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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

    public function store(Request $request)
    {
    	$product =  Product::create($request->all());

    	return redirect('admin');
    }
}
