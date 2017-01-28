<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;

class UserController extends Controller
{
    /**
     * Shows a list of resources.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with('group')->get(),
            'groups' => Group::all()
        ]);
    }

    /**
     * Stores the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {
        request()->merge([
            'password' => bcrypt(request('password')),
            'group_id' => request('group')
        ]);

        User::create(request()->except('_token'));

        return response(['success' => true]);
    }

    /**
     * Updates the resource in the database.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id)
    {
        $user = User::find($id);

        if (request()->has('group')) {
            $user->update([
                'group_id' => request('group')
            ]);
        }

        return response(['success' => true]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response(['success' => true]);
    }
}
