<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data MOU Terdahulu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
            #header { position: fixed; border-bottom:1px solid gray;}
            #footer { position: fixed; border-top:1px solid gray;} .pagenum:before { content: counter(page); } </style>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .box-header {
            position: relative;
            align-items: center;
            justify-content: center;
            width:100%;

        }
        .logo {
            width: 100px;
            position: relative;
            display: inline-block;
        }
        .logo img {
            width: 100%;
        }
        .header-content {
            line-height: 0.5;
        }
        .header-content p {
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
        .text-table {
            font-size: 12px;
        }
        .text-header {
            font-size: 12px;
        }
        .text-center {
            text-align: center;
        }
        .separator {
            border-bottom: 4px solid black;
            margin: -0.5rem 0 1.5rem;
            position: relative;
        }
        .bold {
            font-weight: bold;
        }
        .foto-pengurus {
            padding-right: 20px;
        }
        .container{
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="box-header">
        {{-- <img src="{{ asset('simponi-new.png') }}" style="float:left" width=100 height=100> --}}
        <div class="header-content" style="margin-top:15px">
            <p class="bold">Data Pengajuan {{ $data->title_of_cooperation }} </p>
        </div>
    </div>
    <table class="table table-bordered table-striped text-center" style="margin-top:10px">
        <tr>
            <td colspan="3" class="width:100px"><span class="text-header">Data Umum</span></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><span class="text-table">Judul MOU</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table">{{ $data->title_of_cooperation }}</span></td>
            <td><span class="text-table">Latar Belakang</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table">{{ $data->background }}</span></td>
        </tr>
        <tr>
            <td><span class="text-table">Keterangan</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table">{{ $data->description }}</span></td>
            <td><span class="text-table">Status</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table">{{ $data->status == 0 ? "Tidak Berlaku" : "Masih Berlaku" }}</span></td>
        </tr>
        <tr>
            <td><span class="text-table">Tanggal TTD</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table">{{ $data->tanggal_ttd }}</span></td>
            <td><span class="text-table">Tanggal Berakhir</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table">{{ $data->end_date }}</span></td>
        </tr>
    </table>
</body>
</html>
