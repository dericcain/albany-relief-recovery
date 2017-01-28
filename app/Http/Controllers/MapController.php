<?php

namespace App\Http\Controllers;

use App\Need;
use Auth;

class MapController extends Controller
{
    /**
     * Shows a list of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('map.index');
    }

    public function needs()
    {
        if (Auth::check()) {
            return response(Need::with('physicalNeeds')->get());
        }

        return response(Need::select('id', 'address', 'is_complete', 'is_pending', 'zip', 'lat',
            'lng')->with('physicalNeeds')->get());
    }
}
