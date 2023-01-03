<a class="btn btn-color mb-3" href="#" data-bs-route="{{ route('dashboard.create', $title) }}" data-bs-toggle="modal" data-bs-target="#modalControl" data-bs-table="{{ $title }}" data-bs-type="Create" onclick="event.preventDefault()">{{ __('New') }}&nbsp;&nbsp;<i class="fas fa-circle-plus"></i></a>
<div class="card">
<div class="card-header">
    <div class="group">
    <i class="fas fa-database me-2"></i>
    {{ $title }}
    </div>
</div>
<div class="card-body">
    <table id="fetchTable" class="table">
        <thead>
            <tr> 
                <th>action</th>
                @foreach($columns as $data)
                    @if($data !== 'id')
                    <th>{{ $data }}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                <td><a class="btn btn-sm btn-color ms-3" href="#" data-bs-route="{{ route('dashboard.edit', [$title, $record->id]) }}" data-bs-toggle="modal" data-bs-target="#modalControl" data-bs-table="{{ $title }}" data-bs-type="Edit" onclick="event.preventDefault()"><i class="fas fa-pen-to-square"></i></a>&nbsp;&nbsp;<a class="btn btn-sm btn-danger" href="#" data-bs-route="{{ route('dashboard.destroy', [$title, $record->id]) }}" data-bs-toggle="modal" data-bs-target="#modadel" data-bs-type="Delete" onclick="event.preventDefault()"><i class="fas fa-trash-alt"></i></a></td>
                @foreach($columns as $key => $data)
                    @if($data !== 'id')
                    <td>{{ $record->$data }}</td>
                    @endif
                @endforeach
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr> 
                <th>action</th>
                @foreach($columns as $data)
                    @if($data !== 'id')
                    <th>{{ $data }}</th>
                    @endif
                @endforeach
            </tr>
        </tfoot>
    </table>
</div>
</div>
<div class="big"></div>