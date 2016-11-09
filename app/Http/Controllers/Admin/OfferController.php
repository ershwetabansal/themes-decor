<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
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
    	$offer =  Offer::create($request->all());

    	return redirect('admin');
    }
}
