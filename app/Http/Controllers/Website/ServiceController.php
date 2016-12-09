<?php

namespace App\Http\Controllers\Website;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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
        $data = [];

        $data = Cache::rememberForever('service', function () use($slug) {
            $data['service'] = Service::where('slug', $slug)->firstOrFail();
            $data['images'] = $this->browser->listFilesIn($this->path . $slug);
            return $data;
        });

        extract($data);
       
        return view('app.services.show', compact('service', 'images'));
    }
}
