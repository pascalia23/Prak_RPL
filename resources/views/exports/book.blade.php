<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal terbit</th>
        <th>Dari</th>
        <th>Untuk</th>
        <th>Nomor</th>
        <th>Perihal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{date('d/m/y', strtotime($item->created_at))}}</td>
            <td>{{ $item->dari }}</td>
            <td>{{ $item->untuk }}</td>
            <td>{{ $item->nomor_surat }}</td>
            <td>{{ $item->perihal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>