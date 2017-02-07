<?php

namespace App\Http\Controllers;

use App\GroupVolunteer;
use Carbon\Carbon;

class GroupVolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group_volunteers.index', [
            'volunteers' => GroupVolunteer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group_volunteers.create');
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

        GroupVolunteer::create(request()->except('_token'));

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
        return view('group_volunteers.show', [
            'volunteer' => GroupVolunteer::find($id)
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
        return view('group_volunteers.edit', [
            'volunteer' => GroupVolunteer::find($id)
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

        GroupVolunteer::find($id)->update(request()->except('_token'));

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
}
