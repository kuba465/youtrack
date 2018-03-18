@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.issue.datas')
            </div>
            <div class="col-md-8">
                @include('layouts.issue.description')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.issue.comments')
            </div>
        </div>
    </div>
@endsection