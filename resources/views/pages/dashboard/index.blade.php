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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card bg-white mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
                                <h4>Presensi</h4>
                                <p id="clock"></p>
                            </div>
                            <div class="card-body">
                                <div></div>
                                <h4>Selamat pagi, {{  Auth::user()->name }}!</h4>
                                <p>Silakan @if(empty($done->on_duty)) tekan tombol di bawah ini untuk melakukan presensi. @else isi uraian tugas lalu tekan tombol untuk mengakhiri sesi hari ini. @endif</p>
                                    <form action="{{ route('employee.off', Auth::user()) }}" class="form mt-2" method="POST">
                                        @csrf
                                        <textarea name="task_done" id="task_done" cols="30" rows="10" class="form-control @if(empty($done->on_duty) || !empty($done->off_duty)) d-none @endif" placeholder="Uraian tugas yang berhasil diselesaikan" required="required" autocomplete="off" autofocus="true"></textarea>
                                        <div class="mt-2">
                                        <a href="{{ route('employee.on', Auth::user()) }}" class="btn btn-color" @if(!empty($done->on_duty)) disabled="true" @endif>Masuk</a>
                                        <button class="btn btn-outline-color @if(!empty($done->off_duty)) disabled @endif" type="submit">Keluar</button>
                                        </div>
                                    </form>
                                {{-- Data: {{ empty($done) ? 'No data.' : $done }} --}}
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p>Status:
                                    @if(empty($done->on_duty) == 1 && empty($done->off_duty))
                                        <strong class="text-danger">Belum melakukan presensi</strong>
                                    @elseif(!empty($done->on_duty) && empty($done->off_duty))
                                        <strong class="text-success">Sudah melakukan presensi</strong>
                                    @elseif(!empty($done->on_duty) && !empty($done->off_duty))
                                        <strong class="text-info">Sudah mengakhiri sesi hari ini</strong>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="big"></div>
        @include('components.footer')
    </div>
</div>
@endsection  