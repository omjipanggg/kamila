@extends('layouts.base')
@section('content')
    <div class="container-fluid px-3">

        <div class="row">
            <div class="col">
                <h1 class="mt-3">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.display', $title) }}">{{ $title }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Create') }}</li>
                </ol>
            </div>
            <hr>
        </div>

    	<div class="row">
    		<div class="col">
    			{!! form($form) !!}
    		</div>
    	</div>
    </div>
@endsection