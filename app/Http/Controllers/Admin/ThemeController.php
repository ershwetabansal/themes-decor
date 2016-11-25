<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Filesystem\DirectoryAlreadyExistsException;
use App\Theme;
use Illuminate\Http\Request;
use App\DiskBrowser\DiskBrowser;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class ThemeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('admin');
        $this->path = '/themes/';

    }

    /**
     * Store a theme to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
    	Theme::create($request->all());

    	try {
            $this->browser->createDirectory($request->input('slug'), $this->path );
        } catch (DirectoryAlreadyExistsException $e) {

        }

        return redirect('admin');
    }

    /**
     * Update the theme in database and rename the directory in images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $theme = Theme::where('id', $request->input('id'));
        $oldName = $theme->firstOrFail()->slug;
        $theme->update($request->except('id', '_token'));

        if ($oldName != $request->input('slug')) {
            $this->browser->renameDirectory($this->path, $oldName, $request->input('slug'));
        }
        return redirect('admin');
    }

    /**
     * Delete the theme from database and delete the corresponding directory from database.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $theme = Theme::where('id', $request->input('id'));
        $name = $theme->firstOrFail()->slug;
        $theme->delete();

        $this->browser->deleteDirectory($name, $this->path);
        return redirect('admin');
    }
}
