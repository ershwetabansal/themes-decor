<?php

namespace App\Http\Controllers\Admin;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Store a product to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Package::create($request->all());

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
        $package = Package::where('id', $request->input('id'));
        $package->update($request->except('id', '_token'));

        return redirect()->back();
    }

    /**
     * Delete the product from database and delete the corresponding directory from database.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $package = Package::where('id', $request->input('id'));
        $package->delete();

        return redirect('admin');
    }
}
