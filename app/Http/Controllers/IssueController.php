<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Priority;
use App\Project;
use App\Status;
use App\User;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{
    /**
     * @param Issue $issue
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function details(Issue $issue)
    {
        $images = ['jpg', 'jpeg', 'png', 'gif'];
        $files = [];
        foreach ($issue->files as $file) {
            $files[$file->name]['id'] = $file->id;
            $files[$file->name]['url'] = Storage::disk('public')->url($file->path . '/' . $file->name);
            $files[$file->name]['extension'] = $file->extension;
        }
        return view('layouts.issue.details', compact('issue', 'images', 'files'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validatedDatas = $request->validate([
            'datas.title' => 'required|string|max:255',
            'datas.description' => 'required|string',
            'datas.status' => 'required|integer|exists:statuses,id',
            'datas.priority' => 'required|integer|exists:priorities,id',
            'datas.project' => 'required|integer|exists:projects,id',
            'datas.owner' => 'required|integer|exists:users,id',
            'datas.estimated_time' => 'string|nullable|min:3|max:8|regex:/^\d{1,2}:\d{1,2}:?\d{0,2}$/'
        ]);

        $issue = Issue::create([
            'user_id' => $validatedDatas['datas']['owner'],
            'project_id' => $validatedDatas['datas']['project'],
            'title' => $validatedDatas['datas']['title'],
            'description' => $validatedDatas['datas']['description'],
            'status_id' => $validatedDatas['datas']['status'],
            'priority_id' => $validatedDatas['datas']['priority'],
            'estimated_time' => !empty($validatedDatas['datas']['estimated_time']) ? $validatedDatas['datas']['estimated_time'] : '00:00:00',
        ]);

        $status = Status::find($validatedDatas['datas']['status']);
        if ($status->name == 'Fixed') {
            $issue->is_completed = 1;
            $issue->save();
        }
        return response()->json([
            'issueUrl' => route('issue.details', ['issue' => $issue]),
            'title' => $validatedDatas['datas']['title'],
            'description' => $issue->description,
            'owner' => $issue->owner->name,
            'status' => $issue->status->name,
            'priority' => $issue->priority->name,
            'created_at' => $issue->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $issue->updated_at->format('Y-m-d H:i:s'),
        ], 200);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function createForm(User $user)
    {
        $statuses = Status::all();
        $priorities = Priority::all();
        $projects = Project::projectsAvailableToUser($user);
        $form = view('modals.createIssueForm', compact('statuses', 'priorities', 'projects'))->render();

        return response()->json([
            'form' => $form
        ], 200);
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ownerSelect(Project $project)
    {
        $users = $project->members;
        $select = view('modals.createIssueOwnerSelect', compact('users'))->render();

        return response()->json([
            'select' => $select
        ], 200);
    }

    /**
     * @param Request $request
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, Issue $issue)
    {
        $validatedDatas = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|integer|exists:statuses,id',
            'priority' => 'required|integer|exists:priorities,id',
            'owner' => 'required|integer|exists:users,id',
            'estimated_time' => 'string|nullable|min:3|max:8|regex:/^\d{1,2}:\d{1,2}:?\d{0,2}$/',
            'work_time' => 'string|nullable|min:3|max:8|regex:/^\d{1,2}:\d{1,2}:?\d{0,2}$/'
        ]);

        $statusCheck = Status::find($validatedDatas['status']);
        if ($statusCheck->name == 'Fixed') {
            $issue->is_completed = 1;
        } elseif ($issue->status->name == 'Fixed' && $statusCheck->name != 'Fixed') {
            $issue->is_completed = 0;
        }

        $issue->title = $validatedDatas['title'];
        $issue->status_id = $validatedDatas['status'];
        $issue->priority_id = $validatedDatas['priority'];
        $issue->user_id = $validatedDatas['owner'];
        $issue->estimated_time = !empty($validatedDatas['estimated_time']) ? $validatedDatas['estimated_time'] : '00:00:00';
        $issue->work_time = !empty($validatedDatas['work_time']) ? $validatedDatas['work_time'] : '00:00:00';
        $issue->save();

        return response()->json([
            'title' => $issue->title,
            'owner' => $issue->owner->name,
            'status' => $issue->status->name,
            'priority' => $issue->priority->name,
            'estimatedTime' => $issue->stringOfTime('estimated_time'),
            'workTime' => $issue->stringOfTime('work_time')
        ], 200);
    }

    /**
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     *
     */
    public function editForm(Issue $issue)
    {
        $statuses = Status::all();
        $priorities = Priority::all();
        $users = $issue->project->members;
        $form = view('modals.editIssueForm', compact('statuses', 'priorities', 'users', 'issue'))->render();

        return response()->json([
            'form' => $form
        ], 200);
    }

    /**
     * @param Request $request
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     */
    public function editDescription(Request $request, Issue $issue)
    {
        $validatedDatas = $request->validate([
            'description' => 'required|string',
        ]);

        $issue->description = $validatedDatas['description'];
        $issue->save();

        return response()->json([
            'description' => $issue->description
        ], 200);
    }

    /**
     * @param Issue $issue
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Issue $issue)
    {
        $project = $issue->project;
        $issue->delete();
        return response()->json([
            'project' => route('project.details', ['project' => $project])
        ]);
    }
}
