@extends('layouts.base')
@section('content')
<main class="main" id="main">
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <h1 class="dash mt-3">Dashboard</h1>
                @include('components.breadcrumb')
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('applicant.create') }}" class="btn btn-sm btn-color"><i class="fas fa-plus"></i></a>
                <a href="{{ route('applicant.pkwt') }}" class="btn btn-sm btn-outline-color">PKWT</a>
            </div>
        </div>

        <div class="row">
        	<div class="col">
                @include('components.table')
        	</div>
        </div>
    </div>
</main>
<div class="big"></div>
@endsection