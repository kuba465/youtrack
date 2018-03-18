@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors')
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.home.projects')
                        @if(auth()->user()->can('add.project'))
                            <div class="float-right">
                                <button id="addProject" class="btn btn-success btn-md" data-toggle="modal" data-target="#addProjectForm">
                                    Add Project
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        @forelse($projects as $project)
                            <a href="{{route('project.details', ['project' => $project])}}"
                               class="list-group-item list-group-item-action list-group-item-dark">
                                {{$loop->iteration}}. {{$project->name}}
                            </a>
                        @empty
                            @lang('main.home.no_projects')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createProject')
            @if(auth()->user()->can('show.users'))
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            @lang('main.home.users')
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
                                @lang('main.home.no_users')
                            @endforelse
                        </div>
                    </div>
                </div>
                @include('modals.createUser')
            @endif
            @if(auth()->user()->hasRole('project_member')) <div class="col-md-8"> @else <div class="col-md-4"> @endif
                <div class="card">
                    <div class="card-header">
                        @lang('main.home.issues')
                        <div class="float-right">
                            <button id="createIssueBtn" data-url="{{route('issue.createForm', ['authUser' => auth()->user()])}}" class="btn btn-success btn-md" data-toggle="modal" data-target="#createIssueForm">
                                Create Issue
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="issues">
                        @forelse($issues as $issue)
                            <a href="{{route('issue.details', ['issue' => $issue])}}"
                               class="list-group-item list-group-item-action list-group-item-warning">
                                {{$loop->iteration}}. <strong>{{$issue->title}}</strong>({{$issue->status->name}}/{{$issue->priority->name}})
                            </a>
                        @empty
                            @lang('main.home.no_issues')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createIssue')
        </div>
@endsection
