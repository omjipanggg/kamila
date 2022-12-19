@extends('layouts.base')
@section('content')
<main class="main" id="main">
    <div class="container-fluid attendance-box">
        <div class="row">
            <div class="col">
                <h1 class="dash mt-3">Dashboard</h1>
                @include('components.breadcrumb')
            </div>
        </div>
        <div class="row">
            <div class="col mb-3 order-lg-1 order-2">
                
                <div class="card bg-white">

                    <div class="card-header">
                        <h4>Presensi</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p>Mohon isi 
                                    @foreach($errors->all() as $error)
                                        {{ ($loop->last) ? 'dan ' : '' }}{!! $error !!}{{ ($loop->last) ? '' : ', ' }}
                                    @endforeach
                                     sebelum melanjutkan.</p>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @include('components.functions')
                                <div class="mb-3">
                                    <h4>Selamat {{ greetings() }}, {{  Auth::user()->name }}!</h4>
                                    <p>@if(empty($done->on_duty) && empty($done->off_duty)) Silakan tekan tombol <code><i class="fas fa-location"></i></code> pada peta untuk mendapatkan lokasi Anda, lalu <code>Pilih Jadwal Presensi</code>, kemudian tekan tombol <code>Tap-in</code> di bawah ini untuk melakukan presensi. @elseif(!empty($done->on_duty) && empty($done->off_duty)) Silakan isi <code>Deskripsi Tugas</code>, lalu tekan tombol <code>Tap-out</code> untuk mengakhiri sesi hari ini. @else Terima kasih untuk hari ini, selamat beristirahat! @endif</p>
                                </div>
                                
                                <div class="mid @if(!empty($done->on_duty) && !empty($done->off_duty)) d-none @endif">
                                    <div id="map"></div>
                                </div>

                                @if(empty($done->on_duty) && empty($done->off_duty))
                                <form action="{{ route('employee.on') }}" class="form mt-2" method="POST">
                                    @csrf
                                    <select class="form-control @error('schedule') is-invalid @enderror" name="schedule" id="schedule">
                                        <option value="" disabled="true" selected="true">-- Pilih Jadwal Presensi --</option>
                                        @foreach($schedules as $value)
                                            <option value="{{ $value->id }}" {{ (old('schedule') == $value->id ? 'selected' : '') }} >{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-2 d-flex flex-column flex-sm-row gap-2">
                                        <button class="btn btn-tap btn-color" type="submit">Tap-in&nbsp;&nbsp;<i class="fas fa-stopwatch"></i></button>
                                        <button class="btn btn-tap btn-outline-color disabled" disabled="true">Tap-out</button>
                                    </div>
                                @elseif(!empty($done->on_duty) && empty($done->off_duty))
                                <form action="{{ route('employee.off') }}" class="form mt-3" method="POST">
                                    @csrf
                                    <textarea name="task_done" id="taskDone" cols="30" rows="6" class="form-control @error('task_done') is-invalid @enderror" placeholder="Deskripsi tugas yang berhasil diselesaikan" autocomplete="off" autofocus="true">{{ old('task_done') }}</textarea>
                                    <input type="text" name="description" class="form-control mt-2" autocomplete="off" placeholder="Keterangan" value="{{ old('description') }}" />
                                    <div class="mt-2 d-flex flex-column flex-sm-row gap-2">
                                        <button class="btn btn-tap btn-color disabled" disabled="true">Tap-in</button>
                                        <button class="btn btn-tap btn-outline-color" type="submit">Tap-out&nbsp;&nbsp;<i class="fas fa-stopwatch"></i></button>
                                    </div>
                                @else
                                <div class="mt-2 d-flex flex-column flex-sm-row gap-2">
                                    <button class="btn btn-tap btn-color disabled" disabled="true">Tap-in</button>
                                    <button class="btn btn-tap btn-outline-color disabled" disabled="true">Tap-out</button>
                                </div>
                                @endif
                                <input type="text" id="latId" name="latitude" class="w-100 form-control capture-id" placeholder="Latitude" />
                                <input type="text" id="longId" name="longitude" class="w-100 form-control capture-id" placeholder="Longitude" />
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p>Status:
                            @if(empty($done->on_duty) && empty($done->off_duty))
                                <strong class="text-danger">Belum melakukan presensi</strong>
                            @elseif(!empty($done->on_duty) && empty($done->off_duty))
                                <strong class="text-success">Sudah melakukan presensi</strong>
                            @else
                                <strong class="text-info">Sudah mengakhiri sesi hari ini</strong>
                            @endif
                        </p>
                    </div>

                </div>
            </div>

            <div class="camera-box col-lg-5 mb-3 @if(!empty($done->on_duty) && !empty($done->off_duty)) d-none @endif order-1 order-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Kamera</h4>
                    </div>
                    <div class="card-body @error('image') cameron @enderror">
                        <div class="cam-holder-box">
                            <div id="camHolder"></div>
                        </div>
                        <input type="text" name="image" class="form-control capture-id" id="captureId" autocomplete="off" />
                        <input type="text" name="distance" class="form-control distance-id" id="distanceId" autocomplete="off" />
                        </form>
                        <div class="pt-3 d-flex flex-column flex-sm-row gap-2">
                            <button class="btn btn-color order-2 order-sm-1 w-100" onclick="capture()">Capture&nbsp;&nbsp;<i class="fas fa-camera-retro"></i></button>
                            <button class="btn btn-outline-color order-1 order-sm-2" onclick="clearCapture()">Clear</button>
                        </div>
                        <div class="img-temp-box">
                            <div id="imgTemp"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="small"><strong>Note:&nbsp;</strong>Mohon izinkan akses kamera.</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<div class="big"></div>
@endsection