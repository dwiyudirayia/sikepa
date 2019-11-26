<!DOCTYPE html>
<html>
<head>
	<title>Data Pengajuan Lama</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center>
        <h4>Data Pengajuan Lama</h4>
    </center>
    <br/>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Latar Belakang</th>
                <th>Tanggal TTD</th>
                <th>Tanggal Berakhir</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data as $value)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$value->title_of_cooperation}}</td>
                <td>{{$value->background}}</td>
                <td>{{$value->tanggal_ttd}}</td>
                <td>{{$value->end_date}}</td>
                <td>{{$value->status == 1 ? "Masih Berlaku" : "Tidak Berlaku"}}</td>
                <td>{{$value->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
