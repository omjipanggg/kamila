<div class="modal fade" id="modadel" tabindex="-1" aria-labelledby="modadelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modadelLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modadelBody">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
          {{ Form::open(['route' => 'dashboard.index', 'method' => 'delete', 'id' => 'formDel', 'class' => 'd-flex flex-wrap justify-content-between align-items-center gap-2 w-100']) }}
          <button data-bs-dismiss="modal" type="button" class="btn btn-outline-danger">No</button>
          <button type="submit" class="btn btn-danger flex-fill">Yes</button>
          {{ Form::close() }}
      </div>
    </div>
  </div>
</div>