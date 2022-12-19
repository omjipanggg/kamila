@extends('layouts.base')
@section('content')
<div class="container box-virus">
    <div class="row flex-lg-row-reverse align-items-center justify-content-center">
      <div class="col-lg-6 d-none d-lg-block">
        <img src="{{ asset('img/doctors.png') }}" alt="Doctors" loading="lazy" class="d-block mx-lg-auto img-fluid">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Mari bersama melawan virus COVID-19</h1>
        <p class="lead">Ayo, segera perbarui data diri Anda terkait COVID-19 dan Vaksinasi, serta periksa kesehatan tubuh Anda secara berkala melalui tautan berikut ini: <a href="https://bpjs-kesehatan.go.id/" target="_blank" class="text-decoration-none">https://bpjs-kesehatan.go.id</a></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-3">
          <button type="button" class="btn btn-color btn-lg me-md-2">Informasi&nbsp;&nbsp;<i class="fas fa-circle-info"></i></button>
          <button type="button" class="btn btn-outline-color btn-lg">Unduh&nbsp;&nbsp;<i class="fas fa-download"></i></button>
        </div>
      </div>
    </div>
</div>
@endsection