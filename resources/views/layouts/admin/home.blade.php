@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.admin.projects')
                        <div class="float-right">
                            <button id="addProject" class="btn btn-success btn-md">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        @lang('main.admin.users')
                        <div class="float-right">
                            <button id="addUser" class="btn btn-success btn-md">
                                Add User
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">@lang('main.dashboard.header')</div>
                    <div class="card-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
