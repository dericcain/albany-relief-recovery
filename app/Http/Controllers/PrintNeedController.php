<?php

namespace App\Http\Controllers;

use App\Need;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class PrintNeedController extends Controller
{
    /**
     * Stores the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {

        $needs = Need::whereIn('id', request('needs'))->get();
        $pdf = PDF::loadView('print.pdf', ['needs' => $needs]);

        return $pdf->download('Needs.pdf');
    }

    public function stats()
    {
        $pdf = PDF::loadView('print.stats', [
            'date' => Carbon::now()->format('F j, Y'),
            'completed' => Need::where('is_complete', true)->count(),
            'pending' => Need::completed()->count(),
            'water' => Need::amountOfStat('water'),
            'food' => Need::amountOfStat('nonperishable food'),
            'baby_needs' => Need::amountOfStat('baby needs'),
            'debris_removal' => Need::amountOfStat('debris removal'),
            'home_repair' => Need::amountOfStat('home repair'),
            'medical_supplies' => Need::amountOfStat('minor medical supplies')
        ]);

        return $pdf->download('Stats.pdf');
    }
}
