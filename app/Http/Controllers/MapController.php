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
            return response([
                'needs' => Need::forAuthedUser(),
                'isLoggedIn' => true
            ]);
        }

        return response([
            'needs' => Need::forGuest(),
            'isLoggedIn' => false
        ]);
    }
}
