<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;
use App\DiskBrowser\DiskBrowser;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * @var DiskBrowser
     */
    private $browser;

    /**
     * @var string
     */
    private $path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->browser = new DiskBrowser('image_disk');
        $this->path = '/services/';

    }

    /**
     * Store a service to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Service::create($request->all());

        $this->browser->createDirectory($request->input('slug'), $this->path );

        return redirect('admin');
    }

    /**
     * Update the service in database and rename the directory in images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $service = Service::where('id', $request->input('id'));
        $oldName = $service->firstOrFail()->slug;
        $service->update($request->except('id', '_token'));

        if ($oldName != $request->input('slug')) {
            $this->browser->renameDirectory($this->path, $oldName, $request->input('slug'));
        }

        return redirect('admin');
    }

    /**
     * Delete the service from database and delete the corresponding directory from database.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $service = Service::where('id', $request->input('id'));
        $name = $service->firstOrFail()->slug;
        $service->delete();

        $this->browser->deleteDirectory($name, $this->path);
        return redirect('admin');
    }
}
