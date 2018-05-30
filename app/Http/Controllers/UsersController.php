<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        return User::create($request->all());

    }

    public function show(User $user)
    {
        return $user;
    }


    public function update(Request $request,User $user)
    {
        $user->update($request->all());
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $user;
    }
}
