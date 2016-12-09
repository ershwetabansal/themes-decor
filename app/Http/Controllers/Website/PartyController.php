<?php

namespace App\Http\Controllers\Website;

use App\Http\Requests\Website\PartyStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{

    public function store(PartyStoreRequest $request)
    {

        // TODO send an e-mail to both the parties

        return redirect('book-a-party')->with(['message' => 'We will contact you as soon as possible']);
    }
}
