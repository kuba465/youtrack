<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @param Project $project
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(Project $project)
    {
        $projectManagers = User::role('project_manager')->get();
        return view('layouts.project.details', compact('project', 'projectManagers'));
    }

    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'projectManager' => 'nullable|integer'
        ]);
        $project = Project::create(['name' => $request->input('name')]);
        $project->projectManager()->associate($request->input('projectManager'));
        $project->save();
        return redirect()->route('project.details', compact('project'));
    }

    public function edit(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'projectManager' => 'nullable',
            'id' => 'integer'
        ]);
        $project = Project::find($request['id']);
        $project->name = $request['name'];
        $project->projectManager()->associate($request['projectManager']);
        $project->save();

        $managerId = !empty($project->projectManager) ? $project->projectManager->id : 0;
        $managerName = !empty($project->projectManager) ? $project->projectManager->name : '';

        return response()->json([
           'name' => $project->name,
           'projectManagerId' => $managerId,
           'projectManagerName' => $managerName
        ], 200);
    }

    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.index');
    }
}
