@extends('layouts.base')
@section('content')
    @include('components.modal')
    @include('components.modadel')
    <div class="container-fluid px-3">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col">
            	@include('components.table')
            </div>
        </div>
    </div>
@endsection  