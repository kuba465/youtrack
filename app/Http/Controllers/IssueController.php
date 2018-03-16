<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Priority;
use App\Project;
use App\Status;
use App\User;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * @param Issue $issue
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(Issue $issue)
    {
        return view('layouts.issue.details', compact('issue'));
    }

    public function create(Request $request)
    {

    }

    /**
     * @param User $authUser
     * @return \Illuminate\Http\JsonResponse
     */
    public function createForm(User $authUser)
    {
        $statuses = Status::all();
        $priorities = Priority::all();
        $projects = Project::projectsAvailableToUser($authUser);
        $form = view('modals.createIssueForm', compact('statuses', 'priorities', 'projects'))->render();

        return response()->json([
            'form' => $form
        ], 200);
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function ownerSelect(Project $project)
    {
        $users = $project->members;
        $select = view('modals.createIssueOwnerSelect', compact('users'))->render();

        return response()->json([
            'select' => $select
        ], 200);
    }
}
