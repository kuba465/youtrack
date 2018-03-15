@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.admin.projects')
                        <div class="float-right">
                            <button id="addProject" class="btn btn-success btn-md" data-toggle="modal" data-target="#addProjectForm">
                                Add Project
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($projects as $project)
                            <a href="{{route('project.details', ['project' => $project])}}"
                               class="list-group-item list-group-item-action list-group-item-dark">
                                {{$loop->iteration}}. {{$project->name}}
                            </a>
                        @empty
                            @lang('main.admin.no_projects')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createProject')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.admin.users')
                        <div class="float-right">
                            <button id="createUserBtn" class="btn btn-success btn-md" data-toggle="modal" data-target="#createUserForm">
                                Create User
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="users">
                        @forelse($users as $user)
                            <a href="{{route('user.details', ['user' => $user])}}"
                               class="list-group-item list-group-item-action list-group-item-primary">
                                {{$loop->iteration}}. {{$user->name}}
                            </a>
                        @empty
                            @lang('main.admin.no_users')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createUser')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.admin.issues')
                        <div class="float-right">
                            <button id="createIssueBtn" class="btn btn-success btn-md" data-toggle="modal" data-target="#createIssueForm">
                                Create User
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($issues as $issue)
                            <a href="{{route('issue.details', ['issue' => $issue])}}"
                               class="list-group-item list-group-item-action list-group-item-success">
                                {{$loop->iteration}}. {{$issue->title}}
                            </a>
                        @empty
                            @lang('main.admin.no_issues')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createIssue')
        </div>
    </div>
@endsection
