@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @include('layouts.user.datas')
            </div>
            <div class="col-md-8">
                @include('layouts.user.projects')
            </div>
        </div>
    </div>
@endsection