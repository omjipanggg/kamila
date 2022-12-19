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
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                @foreach($columns as $key => $data)
                    <td>{{ $record->$data }}</td>
                @endforeach
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr> 
                @foreach($columns as $data)
                    <th>{{ $data }}</th>
                @endforeach
            </tr>
        </tfoot>
    </table>
</div>
</div>