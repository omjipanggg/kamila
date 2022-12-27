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

        <div class="row">
        	<div class="col">
                {{ Form::open(['route' => 'applicant.uploadTemplate', 'files' => true,]) }}
                @include('pages.applicant.table')
                {{ Form::close() }}
        	</div>
        </div>
    </div>
</main>
<div class="big"></div>
@endsection