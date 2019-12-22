@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Monitoring Hasil Kerjasama</h2>
                    </div>
                    <form action="{{ route('monitoring.cooperation') }}" method="GET">
                        <div class="search-header sr-btm">
                            <button class="btn btn-search" type="submit"><i class="mdi mdi-magnify"></i></button>
                            <input class="form-control" placeholder="Masukan nomor resi" name="q" value="{{ old('q') ?? $data['q'] }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if ($data['data']['data'] == null)
        <section class="content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="control-group">
                            <div class="main-title text-center sr-btm">
                                <h4 class="title">Data Kosong</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="content-wrap">
            <div class="container">
                <div class="step sr-btm">
                    <ul class="step-nav nav nav-tabs" role="tablist">
                        @if ($data['data']['biro']['approval'] == 1)
                            <li class="step-item active">
                                <a class="step-icon" href="#!">1</a>
                            </li>
                        @elseif($data['data']['biro']['approval'] == 2)
                            <li class="step-item warning">
                                <a class="step-icon" href="#!">1</a>
                            </li>
                        @elseif($data['data']['biro']['approval'] == null)
                            <li class="step-item">
                                <a class="step-icon" href="#!">1</a>
                            </li>
                        @elseif($data['data']['biro']['approval'] == 0)
                            <li class="step-item danger">
                                <a class="step-icon" href="#!">1</a>
                            </li>
                        @else
                            <li class="step-item">
                                <a class="step-icon" href="#!">1</a>
                            </li>
                        @endif
                        @php
                        $initDeputi = 2;
                        $keyDeputi = 2;

                        @endphp
                        @foreach ($data['data']['data']['deputi'] as $item)
                            @if ($item->approval == 1)
                                <li class="step-item active">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item->role->name }}" data-content="{{ $item->reason }}">{{ $initDeputi++ }}</a>
                                </li>
                            @elseif($item->approval == 2)
                                <li class="step-item warning">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item->role->name }}" data-content="{{ $item->reason }}">{{ $initDeputi++ }}</a>
                                </li>
                            @elseif($item->approval == null)
                                <li class="step-item">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item->role->name }}" data-content="{{ $item->reason }}">{{ $initDeputi++ }}</a>
                                </li>
                            @elseif($item->approval == 3)
                                <li class="step-item danger">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item->role->name }}" data-content="{{ $item->reason }}">{{ $initDeputi++ }}</a>
                                </li>
                            @else
                                <li class="step-item">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item->role->name }}" data-content="{{ $item->reason }}">{{ $initDeputi++ }}</a>
                                </li>
                            @endif
                        @endforeach
                        @php
                            $countInitUserKPPA = $keyDeputi + $data['data']['count_deputi'];
                        @endphp
                        @foreach ($data['data']['user_kppa'] as $item)
                            @if ($item['approval'] == 1)
                                <li class="step-item active">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item['role']['name'] }}" data-content="{{ $item['reason'] }}">{{ $countInitUserKPPA++ }}</a>
                                </li>
                            @elseif($item['approval'] == 2)
                                <li class="step-item warning">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item['role']['name'] }}" data-content="{{ $item['reason'] }}">{{ $countInitUserKPPA++ }}</a>
                                </li>
                            @elseif($item['approval'] == null)
                                <li class="step-item">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item['role']['name'] }}" data-content="{{ $item['reason'] }}">{{ $countInitUserKPPA++ }}</a>
                                </li>
                            @elseif($item['approval'] == 3)
                                <li class="step-item danger">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item['role']['name'] }}" data-content="{{ $item['reason'] }}">{{ $countInitUserKPPA++ }}</a>
                                </li>
                            @else
                                <li class="step-item">
                                    <a class="step-icon" href="#!" data-container="body" data-toggle="popover" data-placement="top"  title="{{ $item['role']['name'] }}" data-content="{{ $item['reason'] }}">{{ $countInitUserKPPA++ }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="control-group">
                                <div class="main-title text-center sr-btm">
                                    <h4 class="title">Formulir Jenis Kerjasama</h4>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Usulan jenis kerjasama</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['typeOfCooperation']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Permohonan kerjasama</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['typeOfCooperationOne']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Kesepahaman jenis kerjasama</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['typeOfCooperationTwo']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Instansi</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['agencies']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Negara</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['country']['country_name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Provinsi</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['province']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Kabupaten/Kota</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['regency']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Kodepos</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['postal_code']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Nama Instansi / Kantor</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['agency_name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row flex flex-center">
                                        <div class="col-lg-4 col-md-4"><p>Alamat lengkap Instansi</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['address']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="main-title text-center sr-btm">
                                    <h4 class="title">Formulir Biodata Pemohon/Instansi</h4>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Nama pemohon</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['name']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Jabatan pemohon</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['department']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Nomor telepon</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['no_telp']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Alamat email</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['email']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Maksud dan tujuan</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['purpose_objectives']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Usulan jangka waktu</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['time_period']}} Tahun</b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Latar belakang</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="input-value"><b>{{ $data['data']['data']['background']}}</b></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="main-title text-center sr-btm">
                                    <h4 class="title">Formulir Sasaran Kerjasama</h4>
                                </div>
                                <div class="form-group sr-btm">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4"><p>Sasaran kerjasama</p></div>
                                        <div class="col-lg-8 col-md-8">
                                            @foreach ($data['data']['data']['deputi'] as $item)
                                                <div class="input-value"><b>{{ $item->role->name }}</b></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="{{ asset('assets/js/lightpick.js') }}"></script>
<script>
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
    });
</script>
{{-- <script>

    var picker = new Lightpick({
        field: document.getElementById("jangka_waktu"),
        singleDate: false,
        format: "DD MMMM, YYYY",
        separator: "  →  "
        //onSelect: function(start, end){
            //var str = "";
            //str += start ? start.format("DD MM YYYY") + "to" : "";
            //str += end ? end.format("DD MM YYYY") : "...";
        //}
    });
    setTimeout(function(){
            $(".lightpick__select").each(function(){
            var x = $(this).parent().append("<span></span>");
            console.log(x);
        });

    },400);

</script> --}}
@endsection
