@extends('layouts.base')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="dash">Dashboard</h1>
            @include('components.breadcrumb')

            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                </div>

                <div class="card-body">
                    @foreach($records as $data)
                        <p>{{ __('ID:') }}&nbsp;<strong>{{ $data['lead_id'] }}{{ $data['year_id'] }}{{ sprintf('%03s', $data['id']) }}</strong></p>
                        <p>{{ __('Name:') }}&nbsp;<strong>{{ $data['name'] }}</strong></p>
                        <p>{{ __('Email:') }}&nbsp;<strong>{{ $data['email'] }}</strong></p>
                        <p>{{ __('Role:') }}&nbsp;<strong>{{ $data->user->role->name }}</strong></p>
                    @endforeach
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
