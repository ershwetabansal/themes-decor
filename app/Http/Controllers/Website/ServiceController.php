<?php

namespace App\Http\Controllers\Website;

use App\Service;
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
        parent::__construct();
        $this->path = '/services/';
    }


    /**
     * Show the requested service.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $images = $this->browser->listFilesIn($this->path . $slug);

        return view('app.services.show', compact('service', 'images'));
    }
}
