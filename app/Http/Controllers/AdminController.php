<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        $issues = Issue::all();
        $projectManagers = User::role('project_manager')->get();
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('layouts.admin.home', compact('projects', 'users', 'issues', 'projectManagers', 'roles'));
    }
}
