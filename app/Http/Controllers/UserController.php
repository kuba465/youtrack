<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(User $user)
    {
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('layouts.user.details', compact('user', 'roles'));
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
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        auth()->user()->can('create.projectManager') ? $user->assignRole($request['userType']) : $user->assignRole('project_member');

        return response()->json([
            'name' => $user->name,
            'url' => route('user.details', ['user' => $user]),
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, User $user)
    {
        $validatedDatas = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $validatedDatas['name'];
        $user->email = $validatedDatas['email'];
        $user->save();
        if (auth()->user()->can('create.projectManager')) {
            $user->removeRole($user->roles[0]->name);
            $user->assignRole($request['userType']);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'role' => $request['userType'],
            'roleDescription' => Role::findByName($request['userType'])->description
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(User $user)
    {
        $user->delete();
        return response()->json([
            'home' => route('home')
        ]);
    }
}
