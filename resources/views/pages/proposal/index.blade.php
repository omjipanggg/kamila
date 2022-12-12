@extends('layouts.base')
@section('content')
<div id="layoutSidenav">
    @include('components.accordion')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-3">
                <div class="row">
                    <div class="col">
                        <h1 class="mt-3">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
{{-- 
                <div class="row mb-4">
                	<div class="col">
                        {!! Form::model($model, ['route' => 'applicant.create']) !!}
                        {!! Form::close() !!}
                	</div>
                </div>
--}}
                <div class="row">
                    <div class="col">
                    	@include('components.table')
                    </div>
                </div>
            </div>
        </main>
        @include('components.footer')
    </div>
</div>
@endsection  