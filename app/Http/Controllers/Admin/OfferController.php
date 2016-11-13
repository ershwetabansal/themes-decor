<?php

namespace App\Http\Controllers\Admin;

use App\Offer;
use Illuminate\Http\Request;
use App\DiskBrowser\DiskBrowser;
use App\Http\Controllers\Controller;

class OfferController extends Controller
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
        $this->path = '/offers/';

    }

    /**
     * Store a offer to database and create a directory in the images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Offer::create($request->all());

        $this->browser->createDirectory($request->input('slug'), $this->path );

        return redirect('admin');
    }

    /**
     * Update the offer in database and rename the directory in images folder.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $offer = Offer::where('id', $request->input('id'));
        $oldName = $offer->firstOrFail()->slug;
        $offer->update($request->except('id', '_token'));

        if ($oldName != $request->input('slug')) {
            $this->browser->renameDirectory($this->path, $oldName, $request->input('slug'));
        }

        return redirect('admin');
    }

    /**
     * Delete the offer from database and delete the corresponding directory from database.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $offer = Offer::where('id', $request->input('id'));
        $name = $offer->firstOrFail()->slug;
        $offer->delete();

        $this->browser->deleteDirectory($name, $this->path);
        return redirect('admin');
    }
}
