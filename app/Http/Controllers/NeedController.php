<?php

namespace App\Http\Controllers;

use App\Need;
use App\PhysicalNeed;
use GeoThing\GeoThing;

class NeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('needs.index', [
            'needs' => Need::with('physicalNeeds')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('needs.create', [
            'physicalNeeds' => PhysicalNeed::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $coordinates = GeoThing::getCoordinates(request('address'), request('zip'),
            config('GOOGLE_MAP_API'));
        request()->merge([
            'lat' => round($coordinates->lat, 6),
            'lng' => round($coordinates->lng, 6),
        ]);

        $need = Need::create(request()->except('_token', 'physical_needs'));

        if (request()->has('physical_needs')) {
            $need->physicalNeeds()->attach(request('physical_needs'));
        }

        return response(['success' => true], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('needs.show', [
            'need' => Need::with('physicalNeeds')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $need = Need::find($id);
        if (request()->has('pending')) {
            $need->update(['is_pending' => true]);
        } else if (request()->has('complete')) {
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


        return response(['success' => true]);
    }

    public function edit($id)
    {
        return view('needs.edit', [
            'need' => Need::with('physicalNeeds')->find($id),
            'physicalNeeds' => PhysicalNeed::all()
        ]);
    }
}
