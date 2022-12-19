@extends('layouts.core')

@section('content')
<div class="col col-lg-6 d-none d-lg-block">
    <img src="{{ asset('img/teamwork.png') }}" alt="Background" class="img-overlap-log">
</div>
<div class="container log">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-12 offset-lg-6 col-lg-6">
            <div class="card shadow">
                <a class="float-right" href="#" data-bs-toggle="modal" data-bs-target="#modalManual" title="Manual" onclick="event.preventDefault()">
                    <i class="far fa-question-circle"></i>
                </a>

                <div class="card-header d-flex flex-column align-items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Kamila" class="img-fluid pt-4 pb-2 front-logo-log">
                    <p id="clock"></p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-2">
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus="true" placeholder="Alamat email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <input id="password" type="password" class="form-control password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata sandi">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-column flex-md-row align-items-md-start gap-2 justify-content-between flex-wrap">
                                    <div class="group d-flex flex-column">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" onchange="showChar(event)"/>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Tampilkan kata sandi') }}
                                            </label>
                                        </div>
                                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Lupa kata sandi?') }}
                                        </a>
                                    </div>
                                    <button type="submit" class="btn btn-color">
                                        {{ __('Login') }}&nbsp;&nbsp;<i class="fas fa-angles-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-muted">
                    <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection