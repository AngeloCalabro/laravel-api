<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit(User $user)
    {
        if(!Auth::user()->isAdmin() && $user->user_id !== Auth::id()){
            abort(403);
        }
        $users = User::all();
        return view('admin.users.edit', compact('user', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!Auth::user()->isAdmin() && $user->user_id !== Auth::id()){
            abort(403);
        }
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('admin.users.index')->with('message', "$user->name updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!Auth::user()->isAdmin() && $user->user_id !== Auth::id()){
            abort(403);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', "$user->name deleted successfully");
    }
}
