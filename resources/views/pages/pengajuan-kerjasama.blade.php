@extends('layouts.layout-single')
@section('styles1')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightpick.css') }}">
@endsection
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Pengajuan<br>Kerjasama</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    <!--
                    <div class="step sr-btm">
                        <ul class="step-nav nav nav-tabs" role="tablist">
                            <li class="step-item active">
                                <a class="step-icon" id="step-1" href="#step1" data-toggle="tab" role="tab" aria-controls="step1">1</a>
                            </li>
                            <li class="step-item">
                                <a class="step-icon" id="step-2" href="#step2" data-toggle="tab" role="tab" aria-controls="step2">2</a>
                            </li>
                            <li class="step-item">
                                <a class="step-icon" id="step-3" href="#step3" data-toggle="tab" role="tab" aria-controls="step3">3</a>
                            </li>
                        </ul>
                    </div>
                    -->
                    <form id="submission-cooperation">
                        <div class="tab-content" id="step-pengajuan">
                            <div class="step-btn">1</div>
                            <div id="step1" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Formulir Jenis Kerjasama</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input type="text" class="form-control" name="title_cooperation">
                                                    <label class="text-label">Usulan Judul Kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" name="type_of_cooperation_id" required>
                                                        <option></option>
                                                        @foreach ($data['type'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Usulan jenis kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="type_of_cooperation_one_derivative_id">
                                                        <option></option>
                                                        <option>Kerjasama dalam negri</option>
                                                        <option>Kerjasama luar negri</option>
                                                    </select>
                                                    <label class="text-label">Permohonan kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="nominal" type="text">
                                                    <label class="text-label">Nominal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="type_of_cooperation_two_derivative_id">
                                                        <option></option>
                                                        <option>Perjanjian kerjasama</option>
                                                        <option>Perpanjangan MOU/PKS</option>
                                                        <option>Lain-lain</option>
                                                    </select>
                                                    <label class="text-label">Kesepahaman jenis kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="agencies_id">
                                                        <option></option>
                                                        @foreach ($data['agency'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Instansi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="countries_id">
                                                        <option value=""></option>
                                                        @foreach ($data['country'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Negara</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="province_id">
                                                        <option value=""></option>
                                                    </select>
                                                    <label class="text-label">Provinsi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="regency_id">
                                                        <option></option>
                                                        <option>Kabupaten</option>
                                                        <option>Kota</option>
                                                    </select>
                                                    <label class="text-label">Kab./Kota</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="postal_code" type="text">
                                                    <label class="text-label">Kode pos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div id="loc-result"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" id="loc-search" name="agency_name" placeholder="">
                                                    <label class="text-label">Masukan alamat instansi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="address">
                                                    <label class="text-label">Alamat lengkap instansi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-btn">2</div>
                            <div id="step2" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Formulir Biodata Pemohon/Instansi</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="nama">
                                                    <label class="text-label">Nama pemohon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="department">
                                                    <label class="text-label">Jabatan pemohon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" id="ktp" type="file" name="ktp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="ktp" onclick="getFile()"></label>
                                                    </div>
                                                    <label class="text-label">KTP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" id="npwp" name="npwp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="npwp" onclick="getFile()"></label>
                                                    </div>
                                                    <label class="text-label">NPWP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" name="siup" id="siup">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="siup" onclick="getFile()"></label>
                                                    </div>
                                                    <label class="text-label">SIUP/akta pendirian organisasi/lainnya</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="no_telp" name="text">
                                                    <label class="text-label">Nomor telepon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="email">
                                                    <label class="text-label">Alamat email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <textarea class="form-control" name="purpose_objectives" id="" cols="30" rows="10"></textarea>
                                                    <label class="text-label">Maksud dan tujuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" name="time_period">
                                                        <option></option>
                                                        <option>1 tahun</option>
                                                        <option>2 tahun</option>
                                                        <option>3 tahun</option>
                                                        <option>4 tahun</option>
                                                        <option>5 tahun</option>
                                                    </select>
                                                    <label class="text-label">Usulan jangka waktu</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="background">
                                                    <label class="text-label">Latar belakang</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" id="agency_profile" name="agency_profile">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="agency_profile" onclick="getFile()"></label>
                                                    </div>
                                                    <label class="text-label">Profil instansi</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" id="proposal" name="proposal">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="proposal" onclick="getFile()"></label>
                                                    </div>
                                                    <label class="text-label">Proposal</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-btn">3</div>
                            <div id="step3" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Formulir Sasaran Kerjasama</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <div class="form-input">
                                                        <select class="form-control select2-multiple" name="type_guest_id" multiple>
                                                            <option></option>
                                                            <option>Deputi Bidang Kesetaraan Gender</option>
                                                            <option>Deputi Bidang Hak Perempuan</option>
                                                            <option>Deputi Bidang Perlindungan Perempuan</option>
                                                            <option>Deputi Bidang Tumbuh Kembang Anak</option>
                                                            <option>Deputi Bidang Partisipasi Masyarakat</option>
                                                            <option>SESMEN</option>
                                                        </select>
                                                        <label class="text-label">Sasaran kerjasama</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script>
    const form = $('#submission-cooperation').show();
    $("#step-pengajuan").steps({
    headerTag: ".step-btn",
    bodyTag: ".tab-pane",
    titleTemplate: "#title#",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18)
        {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex)
    {
        // Used to skip the "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
        {
            form.steps("next");
        }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3)
        {
            form.steps("previous");
        }
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        alert("Submitted!");
    }
}).validate({
    errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        confirm: {
            equalTo: "#password-2"
        }
    }
});
</script>
@endsection
