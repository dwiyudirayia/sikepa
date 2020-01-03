<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelompok Tani</title>
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
            <p class="bold">Data Pengajuan {{ $data->title_cooperation }} </p>
        </div>
    </div>
    <table class="table table-bordered table-striped text-center" style="margin-top:10px">
        <tr>
            <td colspan="3" class="width:100px"><span class="text-header">Data Umum</span></td>
        </tr>
    </table>
    <table>
        <tr>
            <td><span class="text-table">Jenis Kerjasama</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table"> {{ $data->typeOfCooperationOne->name ?? "Kosong" }} </span></td>
            <td><span class="text-table">Kesepahaman Jenis Kerjasama</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table">{{ $data->typeOfCooperationTwo->name ?? "Kosong" }}</span></td>
        </tr>
        <tr>
            <td><span class="text-table">Negara</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table"> {{ $data->country->country_name }} </span></td>
            <td><span class="text-table">Instansi</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table">{{ $data->agencies->name }}</span></td>
        </tr>
        <tr>
            <td><span class="text-table">Nama Instansi</span></td>
            <td><span class="text-table"> : </span></td>
            <td width="250"><span class="text-table">{{ $data->agency_name }}</span></td>
            <td><span class="text-table">Alamat Instansi</span></td>
            <td><span class="text-table"> : </span></td>
            <td><span class="text-table"> {{ $data->address }} </span></td>
        </tr>
    </table>
    @foreach ($data->monevActivity as $key => $item)
    @php
        if($item->result != null) {
            if($item->result->evaluation == 1)
            {
                $evaluation = "Sangat Tidak Memuaskan";
            } elseif($item->result->evaluation == 2) {
                $evaluation = "Tidak Memuaskan";
            } elseif ($item->result->evaluation == 3) {
                $evaluation = "Sesuai Standar";
            } elseif ($item->result->evaluation == 4) {
                $evaluation = "Memuaskan";
            } else {
                $evaluation = "Sangat Memuaskan";
            }

            if($item->result->recomendation == 1)
            {
                $recomendation = "Diadendum";
            } elseif($item->result->recomendation == 2) {
                $recomendation = "Dihentikan";
            } else {
                $recomendation = "Dilanjutkan";
            }
        }
    @endphp
        <table class="table table-bordered table-striped texth -center" style="margin-top:10px">
            <tr>
                <td colspan="3" class="width:100px"><span class="text-header">Aktifitas Kegiatan Ke -{{ $key +1 }}</span></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><span class="text-table">Anggaran</span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table">Rp. {{ number_format($item->budget,2,',','.') }}</span></td>
            </tr>
            <tr>
                <td><span class="text-table">Target</span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table"> {{ $item->target }} </span></td>
            </tr>
            <tr>
                <td><span class="text-table">Capaian</span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table">{{ $item->reach }}</span></td>
            </tr>
            <tr>
                <td><span class="text-table">Masalah</span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table">{{ $item->problem }}</span></td>
            </tr>
            <tr>
                <td><span class="text-table">Upaya Penyelesaian</span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table">{{ $item->problem_solving }}</span></td>
            </tr>
            <tr>
                <td><span class="text-table"><b>Evaluasi<b></span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table"><b>{{ $evaluation }}</b></span></td>
            </tr>
            <tr>
                <td><span class="text-table"><b>Rekomendasi</b></span></td>
                <td><span class="text-table"> : </span></td>
                <td><span class="text-table"><b>{{ $recomendation }}</b></span></td>
            </tr>
        </table>
    @endforeach
</body>
</html>
