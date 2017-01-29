<?php

namespace App\Http\Controllers;

use App\UrgentNeed;
use GeoThing\GeoThing;

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

    /**
     * Stores the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {
        $coordinates = GeoThing::getCoordinates(request('address'), request('zip'),
            config('GOOGLE_MAP_API'));
        request()->merge([
            'lat' => round($coordinates->lat, 6),
            'lng' => round($coordinates->lng, 6),
        ]);

        UrgentNeed::create(request()->except('_token'));

        return response(['success' => true]);
    }

    /**
     * Shows a list of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('urgent_needs.create');
    }

    /**
     * Shows a resources with the given ID.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('urgent_needs.show', [
            'need' => UrgentNeed::find($id)
        ]);
    }

    /**
     * Shows a resources with the given ID.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('urgent_needs.edit', [
            'need' => UrgentNeed::find($id)
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id)
    {
        $need = UrgentNeed::find($id);

        if (request()->has('pending')) {
            $need->update(['is_pending' => true]);
        } else {
            if (request()->has('complete')) {
                $need->update([
                    'is_complete' => true,
                    'is_pending' => false
                ]);
            } else {
                $coordinates = GeoThing::getCoordinates(request('address'), request('zip'),
                    config('GOOGLE_MAP_API'));
                request()->merge([
                    'lat' => round($coordinates->lat, 6),
                    'lng' => round($coordinates->lng, 6),
                ]);
                $need->update(request()->except('_token', 'physical_needs'));
                if (request()->has('physical_needs')) {
                    $need->physicalNeeds()->sync(request('physical_needs'));
                }
            }
        }

        return response(['success' => true]);
    }
}
