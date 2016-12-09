<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Filesystem\DirectoryAlreadyExistsException;
use App\Product;
use Illuminate\Http\Request;
use App\DiskBrowser\DiskBrowser;
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
        parent::__construct();
        $this->middleware('admin');
        $this->path = '/products/';

    }

    /**
     * Store a product to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Product::create($request->all());

        $this->browser->createDirectory($request->input('slug'), $this->path );

        return redirect('admin');
    }

    /**
     * Update the product in database and rename the directory in images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $product = Product::where('id', $request->input('id'));
        $oldName = $product->firstOrFail()->slug;
        $product->update($request->except('id', '_token'));

        if ($oldName != $request->input('slug')) {
            $this->browser->renameDirectory($this->path, $oldName, $request->input('slug'));
        }

        return redirect()->back();
    }

    /**
     * Delete the product from database and delete the corresponding directory from database.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->input('id'));
        $name = $product->firstOrFail()->slug;
        $product->delete();

        $this->browser->deleteDirectory($name, $this->path);
        return redirect('admin');
    }
}
