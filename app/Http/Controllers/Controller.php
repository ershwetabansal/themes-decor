<?php

namespace App\Http\Controllers;

use App\DiskBrowser\DiskBrowser;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * @var DiskBrowser
     */
    protected $browser;

    /**
     * @var string
     */
    protected $path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->browser = new DiskBrowser('image_disk');
        $this->path = '/';
    }
}
