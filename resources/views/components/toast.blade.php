@if (Session::has('status'))
<div class="toast-container">
  <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="{{ asset('img/favicon.png') }}" class="rounded me-2" alt="Logo">
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ Session::get('status') }}</div>
  </div>
</div>
@endif