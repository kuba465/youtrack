<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @param Project $project
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(Project $project)
    {
        return view('layouts.project.details', compact('project'));
    }

    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'projectManager' => 'nullable|integer'
        ]);
        $project = Project::create($request->all());
        return redirect()->route('project.details', compact('project'));
    }
}
