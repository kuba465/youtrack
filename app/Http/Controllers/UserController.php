<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(User $user)
    {
        return view('layouts.user.details', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'userType' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        auth()->user()->can('create.projectManager') ? $user->assignRole($request['userType']) : $user->assignRole('project_member');
        $usersCount = User::all()->count();

        return response()->json([
            'name' => $user->name,
            'url' => route('user.details', ['user' => $user]),
            'count' => $usersCount
        ]);
    }
}
