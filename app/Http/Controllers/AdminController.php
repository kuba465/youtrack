<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        return view('layouts.admin.home', compact('projects', 'users'));
    }
}
