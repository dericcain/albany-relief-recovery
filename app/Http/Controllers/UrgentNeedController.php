<?php

namespace App\Http\Controllers;

use App\UrgentNeed;

class UrgentNeedController extends Controller
{
    /**
     * Shows a list of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('urgent_needs.index', [
            'needs' => UrgentNeed::all()
        ]);
    }
}
