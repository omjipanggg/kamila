<div class="card">
<div class="card-header">
    <i class="fas fa-database me-2"></i>
    {{ $title }}
</div>
<div class="card-body">
	<div class="form-group mb-2">
	    <label for="template" class="mb-1">Upload template</label>
        <input type="file" class="@error('template') is-invalid @enderror form-control" id="template" name="template" aria-label="Upload" />
        @error('template')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
	<div class="table-responsive">
		<table class="table table-hover table-pkwt">
			<thead>
				<tr>
					<th class="text-center @error('selectedId') table-danger @enderror">#</th>
					<th>submission_date</th>
					<th>due_date</th>
					<th>position</th>
					<th>department</th>
					<th>vendor</th>
					<th>id_number</th>
					<th>name</th>
					<th>gender</th>
					<th>birthdate</th>
					<th>address</th>
					<th>email</th>
					<th>phone</th>
				</tr>
			</thead>
			<tbody>
				@include('components.functions')
				@php($i = 1)
				@foreach($records as $record)
				<tr>
					<td class="@error('selectedId') table-danger @enderror"><input type="checkbox" class="form-check-input" id="checkbox{{ $i }}" name="selectedId[]" value="{{ $record->id }}" onclick="ckChange(this)" /></td>
					<td>{{ dateFormat($record->proposal->created_at) }}</td>
					<td>{{ dateFormat($record->proposal->expire_date) }}</td>
					<td>{{ $record->proposal->position->name }}</td>
					<td>{{ $record->proposal->position->department->name }}</td>
					<td>{{ $record->proposal->vendor->name }}</td>
					<td>{{ $record->applicant->id_number }}</td>
					<td>{{ $record->applicant->name }}</td>
					<td>{{ $record->applicant->gender->name }}</td>
					<td>{{ dateFormat($record->applicant->birth_date) }}</td>
					<td>{{ $record->applicant->current_address }}</td>
					<td>{{ $record->applicant->email }}</td>
					<td>{{ $record->applicant->phone_number }}</td>
				</tr>
				@php($i++)
				@endforeach
			</tbody>
		</table>
	</div>
    @error('selectedId')
	<p class="text-danger small"><strong>{{ $message }}</strong></p>
    @enderror

</div>
<div class="card-footer">
    <button class="btn btn-color" type="submit">Submit</button>
</div>
</div>