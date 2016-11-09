<?php

namespace App\Http\Controllers\Admin;

use App\Theme;
use App\Http\Requests;
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
        $this->middleware('admin');
    }

    public function store(Request $request)
    {
    	$theme =  Theme::create($request->all());

    	return redirect('admin');
    }

    public function update(Request $request)
    {
        $input =  $request->except('id', '_token');

        $theme =  Theme::where('id', $request->input('id'))->update($input);

        return redirect('admin');
    }
}
