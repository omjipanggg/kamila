<div class="card">
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    {{ $title }}
</div>
<div class="card-body">
    <table id="fetchTable">
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
    </table>
</div>
</div>