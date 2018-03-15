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
        return view('layouts.project.details', compact('project', 'projectManagers', 'projectMembers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.index');
    }

    public function addMember(Request $request, Project $project, User $member)
    {
        $request->validate([
            'member' => 'required|integer|exists:users,id',
        ]);

        $project->members()->attach($member);

        return response()->json([
            'id' => $member->id,
            'name' => $member->name,
            'email' => $member->email,
            'userUrl' => route('user.details', ['user' => $member]),
            'deleteUrl' => route('project.getDeleteMemberLink', ['project' => $project, 'member' => $member])
        ], 200);
    }

    public function addMemberForm(Project $project)
    {
        $projectMembers = User::projectMembers($project)->get();
        $form = view('modals.addMemberForm', compact('projectMembers'))->render();
        return response()->json([
            'form' => $form
        ]);
    }

    public function getDeleteMemberLink(Project $project, User $member)
    {
        $link = route('project.deleteMember', ['project' => $project, 'member' => $member]);
        return response()->json([
            'link' => $link
        ]);
    }

    public function deleteMember(Project $project, User $member)
    {
        $project->members()->detach($member);
        return response()->json([
            'id' => $member->id
        ], 200);
    }
}
