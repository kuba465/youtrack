<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param User $user
     */
    public function details(User $user)
    {
        return view('layouts.user.details', compact('user'));
    }
}
