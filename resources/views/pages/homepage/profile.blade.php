@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in as') }}
                    <strong>{{ Auth::user()->name; }}</strong>.
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
