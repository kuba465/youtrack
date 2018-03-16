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
        $projectManager = $project->getProjectManager();
        $projectManagers = User::role('project_manager')->get();
        return view('layouts.project.details', compact('project', 'projectManager', 'projectManagers', 'projectMembers'));
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
        if(!empty($request['projectManager'])){
            $project->members()->attach($request['projectManager'], ['is_project_manager' => true]);
        }
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

        $value = (int)$request['projectManager'];
        $projectManager = $project->changeProjectManager($value);
        $project->save();

        return response()->json([
            'name' => $project->name,
            'projectManagerId' => $value > 0 ? $projectManager->id : 0,
            'projectManagerName' => $value > 0 ? $projectManager->name : ''
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
        return redirect()->route('home');
    }

    /**
     * @param Request $request
     * @param Project $project
     * @param User $member
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMemberForm(Project $project)
    {
        $projectMembers = User::projectMembers($project)->get();
        $form = view('modals.addMemberForm', compact('projectMembers'))->render();
        return response()->json([
            'form' => $form
        ], 200);
    }

    public function getDeleteMemberLink(Project $project, User $member)
    {
        $link = route('project.deleteMember', ['project' => $project, 'member' => $member]);
        return response()->json([
            'link' => $link
        ], 200);
    }

    /**
     * @param Project $project
     * @param User $member
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMember(Project $project, User $member)
    {
        $project->members()->detach($member);
        return response()->json([
            'id' => $member->id
        ], 200);
    }
}
