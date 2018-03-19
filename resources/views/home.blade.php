@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('errors')
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        @lang('main.project.project_plural')
                        @if(auth()->user()->can('add.project'))
                            <div class="float-right">
                                <button id="addProject" class="btn btn-success btn-md" data-toggle="modal" data-target="#addProjectForm">
                                    @lang('main.project.create')
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
                            @lang('main.project.no_projects')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createProject')
            @if(auth()->user()->can('show.users'))
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            @lang('main.user.user_plural')
                            <div class="float-right">
                                <button id="createUserBtn" class="btn btn-success btn-md" data-toggle="modal" data-target="#createUserForm">
                                    @lang('main.user.create')
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
                                @lang('main.user.no_users')
                            @endforelse
                        </div>
                    </div>
                </div>
                @include('modals.createUser')
            @endif
            @if(auth()->user()->hasRole('project_member')) <div class="col-md-9"> @else <div class="col-md-6"> @endif
                <div class="card">
                    <div class="card-header">
                        @lang('main.issue.issue_plural')
                        <div class="float-right">
                            <button id="createIssueBtn" data-url="{{route('issue.createForm', ['authUser' => auth()->user()])}}"
                                    class="btn btn-success btn-md" data-toggle="modal" data-target="#createIssueForm">
                                @lang('main.issue.create')
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
                            @lang('main.issue.no_issues')
                        @endforelse
                    </div>
                </div>
            </div>
            @include('modals.createIssue')
        </div>
        </div>
@endsection
