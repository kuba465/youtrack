@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">@lang('main.admin.projects')</div>
                    <div class="card-body">
                        You are logged in!
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">@lang('main.admin.users')</div>
                    <div class="card-body">
                        You are logged in!
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
