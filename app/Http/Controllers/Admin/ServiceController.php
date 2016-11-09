<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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
    	$service =  Service::create($request->all());

    	return redirect('admin');
    }

    public function update(Request $request)
    {
        $input =  $request->except('id', '_token');

        $service =  Service::where('id', $request->input('id'))->update($input;);

        return redirect('admin');
    }
}
