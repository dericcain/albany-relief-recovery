<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Carbon\Carbon;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('volunteers.index', [
            'volunteers' => Volunteer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->merge([
            'date_available' => Carbon::parse(request('date_available'))->toDateString()
        ]);

        Volunteer::create(request()->except('_token'));

        return response(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('volunteers.show', [
            'volunteer' => Volunteer::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('volunteers.edit', [
            'volunteer' => Volunteer::find($id)
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
        $this->getCheckboxValues();

        Volunteer::find($id)->update(request()->except('_token'));

        return response(['success' => true]);
    }

    /**
     * We need to see if the checkboxes were POSTed. If not, then we need to set them to false.
     */
    public function getCheckboxValues()
    {
        request()->merge([
            'date_available' => Carbon::parse(request('date_available'))->toDateString(),
            'speaks_spanish' => request()->has('speaks_spanish') ? true : false,
            'debris_removal' => request()->has('debris_removal') ? true : false,
            'home_repair' => request()->has('home_repair') ? true : false,
            'deliveries' => request()->has('deliveries') ? true : false,
            'administrative' => request()->has('administrative') ? true : false,
            'sorting' => request()->has('sorting') ? true : false,
            'communications' => request()->has('communications') ? true : false,
            'counseling' => request()->has('counseling') ? true : false,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
