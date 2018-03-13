@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.project.datas')
            </div>
            <div class="col-md-8">
                @include('layouts.project.members')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.project.issues')
            </div>
        </div>
    </div>
@endsection