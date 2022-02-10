@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <sidebar-component></sidebar-component>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
