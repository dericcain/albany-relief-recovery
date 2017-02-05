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
            'pending' => Need::completed()->count(),
            'water' => Need::amountOfStat('water'),
            'food' => Need::amountOfStat('nonperishable food'),
            'baby_needs' => Need::amountOfStat('baby needs'),
            'debris_removal' => Need::amountOfStat('debris removal'),
            'home repair' => Need::amountOfStat('home repair'),
            'medical_supplies' => Need::amountOfStat('minor medical supplies')
        ]);
    }
}
