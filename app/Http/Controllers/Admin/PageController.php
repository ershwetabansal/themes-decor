<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Filesystem\DirectoryAlreadyExistsException;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
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
        $this->path = '/pages/';

    }

    /**
     * Store a page to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Page::create($request->all());

        $this->browser->createDirectory($request->input('slug'), $this->path );
        
        return redirect('admin');
    }

    /**
     * Update the page in database and rename the directory in images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $page = Page::where('id', $request->input('id'));
        $oldName = $page->firstOrFail()->slug;
        $page->update($request->except('id', '_token'));

        if ($oldName != $request->input('slug')) {
            $this->browser->renameDirectory($this->path, $oldName, $request->input('slug'));
        }

        return redirect('admin');
    }

    /**
     * Delete the offer from database and delete the corresponding directory from database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $page = Page::where('id', $request->input('id'));
        $name = $page->firstOrFail()->slug;
        $page->delete();

        $this->browser->deleteDirectory($name, $this->path);
        return redirect('admin');
    }
}
