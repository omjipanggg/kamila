@if (Session::has('status'))
<div class="toast-container">
  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="{{ URL::to('assets/img/favicon.png') }}" class="rounded me-2" alt="Logo">
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ Session::get('status') }}</div>
  </div>
</div>
@endif