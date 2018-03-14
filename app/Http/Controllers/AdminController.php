<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $issues = Issue::all();
        $projectManagers = User::role('project_manager')->get();
        return view('layouts.admin.home', compact('projects', 'users', 'issues', 'projectManagers'));
    }
}
