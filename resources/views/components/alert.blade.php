{{-- @if (Session::has('status')) --}}
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{-- <p>{{ Session::get('status') }}</p> --}}
  <p>Berhasil...</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
{{-- @endif --}}