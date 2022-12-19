<div class="card">
<div class="card-header">
    <i class="fas fa-database me-2"></i>
    {{ $title }}
</div>
<div class="card-body">
    <table id="fetchTable" class="table">
        <thead>
            <tr> 
                @foreach($columns as $data)
                    <th>{{ $data }}</th>
                @endforeach
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                @foreach($columns as $key => $data)
                    <td>{{ $record->$data }}</td>
                @endforeach
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr> 
                @foreach($columns as $data)
                    <th>{{ $data }}</th>
                @endforeach
                <th>Action</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>