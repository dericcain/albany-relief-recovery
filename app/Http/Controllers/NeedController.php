<?php

namespace App\Http\Controllers;

use App\Http\Forms\StoreNeedForm;
use App\Http\Forms\UpdateNeedForm;
use App\Need;
use App\PhysicalNeed;

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
        $storeNeedForm = new StoreNeedForm;
        $storeNeedForm->save();

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
        $updateNeedForm = new UpdateNeedForm($id);
        $updateNeedForm->save();

        return response(['success' => true], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('needs.edit', [
            'need' => Need::with('physicalNeeds')->find($id),
            'physicalNeeds' => PhysicalNeed::all()
        ]);
    }
}
