<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Follower;
use App\Models\JobPosition;
use App\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = Follower::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(Follower $user)
    {
        $roles = JobPosition::all()->pluck('title', 'id');

        $user->load('permissions');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, Follower $user)
    {
        $data = $request->getCredentials();

        if(!empty($data))
            $user->update($data);

        $user->permissions()->sync($request->getRoles());

        return redirect()->route('admin.users.index');
    }

    public function show(Follower $user)
    {
        $user->load('permissions');

        return view('admin.users.show', compact('user'));
    }
}
