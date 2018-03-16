<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = \auth()->user();
        $projects = Project::projectsAvailableToUser($authUser);
        $users = User::usersVisibleForAuthUser($authUser);
        $issues = Issue::all();
        $projectManagers = User::role('project_manager')->get();
        $roles = Role::where('name', '<>', 'admin')->get();
        return view('home', compact('projects', 'users', 'issues', 'projectManagers', 'roles'));
    }
}
