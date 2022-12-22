@extends('layouts.base')
@section('content')
<main class="main" id="main">
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <h1 class="dash mt-3">Dashboard</h1>

                @include('components.breadcrumb')

                @include('components.table')
            </div>
        </div>
        
    </div>
</main>
<div class="big"></div>
@endsection