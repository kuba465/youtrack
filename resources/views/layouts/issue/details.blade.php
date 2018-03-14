@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.issue.datas')
            </div>
            <div class="col-md-8">
                @include('layouts.issue.projects')
            </div>
        </div>
    </div>
@endsection