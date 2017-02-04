<?php

namespace App\Http\Controllers;

use App\Need;

class StatController extends Controller
{
    /**
     * Shows a list of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return response()->json([
            'completed' => Need::where('is_complete', true)->count(),
            'pending' => Need::where('is_pending', true)->count(),
        ]);
    }
}
