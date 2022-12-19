@extends('layouts.core')

@section('content')
<div class="d-none d-lg-block container-overlap-reg">
    <img src="{{ asset('img/teamwork-1.png') }}" alt="Background" class="img-overlap-reg">
</div>
<div class="container reg">
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-6">
            <div class="card shadow">
                <a class="float-right" href="#" data-bs-toggle="modal" data-bs-target="#modalManual" title="Manual" onclick="event.preventDefault()">
                    <i class="far fa-question-circle"></i>
                </a>

                <div class="card-header d-flex flex-column align-items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Kamila" class="img-fluid pt-4 pb-2 front-logo-reg">
                    <p id="clock"></p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-2">
                            <div class="col">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus="true" placeholder="Nama lengkap">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <input id="password" type="password" class="form-control password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Kata sandi">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <input id="password-confirm" type="password" class="form-control password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi kata sandi">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col">
                                <div class="group d-flex flex-wrap gap-2 justify-content-between align-items-start">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" onchange="showChar(event)"/>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Tampilkan kata sandi') }}
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-color">
                                    {{ __('Register') }}&nbsp;&nbsp;<i class="fas fa-angles-right"></i>
                                </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
