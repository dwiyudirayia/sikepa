@extends('layouts.layout-single')
@section('styles1')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightpick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
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
                    <form id="submission-cooperation" action="{{ route('cooperation.submission.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="tab-content" id="step-pengajuan">
                            <div class="step-btn">1</div>
                            <div id="step1" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Formulir Pengajuan Kerjasama</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group {{ $errors->has('title_cooperation') ? 'has-error' : '' }}">
                                                <div class="form-input">
                                                    <input type="text" class="form-control required" id="title_cooperation" name="title_cooperation" value="{{ old('title_cooperation') }}">
                                                    <label class="text-label">Usulan Judul MOU</label>
                                                </div>
                                                @if($errors->has('title_cooperation'))
                                                    <p style="color:red;">{{ $errors->first('title_cooperation') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-fund">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="type_of_cooperation_one_derivative_id" name="type_of_cooperation_one_derivative_id">
                                                        <option value=""></option>
                                                        @foreach ($data['type_one'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Jenis Kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-typeof-one">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="type_of_cooperation_two_derivative_id" name="type_of_cooperation_two_derivative_id">
                                                    </select>
                                                    <label class="text-label">Jenis Kesepakatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12" id="is-not-mou" style="display:none">
                                            <div class="form-group {{ $errors->has('submission_proposal_guest_id') ? 'has-error' : '' }}">
                                                <div class="form-input">
                                                    <select class="form-control select2" id="submission_proposal_guest_id" name="submission_proposal_guest_id">
                                                        <option></option>
                                                        @foreach ($data['mou'] as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title_cooperation }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Judul Kerjasama Sebelumnya</label>
                                                </div>
                                                @if($errors->has('submission_proposal_guest_id'))
                                                    <p style="color:red;">{{ $errors->first('submission_proposal_guest_id') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group {{ $errors->has('agencies_id') ? 'has-error' : '' }}">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="agencies_id" name="agencies_id">
                                                        <option></option>
                                                        @foreach ($data['agency'] as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Jenis Instansi</label>
                                                </div>
                                                @if($errors->has('agencies_id'))
                                                    <p style="color:red;">{{ $errors->first('agencies_id') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="countries_id" name="countries_id">
                                                        <option value=""></option>
                                                        @foreach ($data['country'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Negara</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 is-indonesian">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" id="province_id" name="province_id">
                                                        <option value=""></option>
                                                    </select>
                                                    <label class="text-label">Provinsi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 is-indonesian">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" id="regency_id" name="regency_id">
                                                    </select>
                                                    <label class="text-label">Kab / Kota</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="postal_code" id="postal_code" type="text">
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
                                                    <input class="form-control required" id="loc-search" name="agency_name" type="text">
                                                    <label class="text-label">Masukan nama instansi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input type="text" id="addressLabel" class="form-control required" disabled>
                                                    <input type="hidden" id="address" name="address" class="form-control required">
                                                    <label class="text-label">Alamat lengkap instansi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input type="text" id="latitudeLabel" class="form-control required" disabled>
                                                    <input type="hidden" id="latitude" name="latitude" class="form-control required">
                                                    <label class="text-label">Koordinat (Latitude)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input type="text" id="longitudeLabel" class="form-control requried" disabled>
                                                    <input type="hidden" id="longitude" name="longitude" class="form-control required">
                                                    <label class="text-label">Koordinat (Longitude)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-btn">2</div>
                            <div id="step2" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Data Pemohon</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" name="name" id="name" type="text">
                                                    <label class="text-label">Nama pemohon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" name="department" id="department" type="text">
                                                    <label class="text-label">Jabatan pemohon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-not-mou" style="display:none">
                                            <div class="form-group {{ $errors->has('ktp') ? 'has-error' : '' }}">
                                                <div class="form-input input-file">
                                                    <input class="upload" id="ktp" type="file" name="ktp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="ktp" onclick="getFile()"></label>
                                                        <label class="icon" for="ktp"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">KTP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                                @if($errors->has('ktp'))
                                                    <p style="color:red;">{{ $errors->first('ktp') }}</p>
                                                @endif
                                                <span>Ekstensi File Harus <strong>JPEG, PDF, PNG & JPG</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 is-ministry">
                                            <div class="form-group {{ $errors->has('npwp') ? 'has-error' : '' }}">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" id="npwp" name="npwp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="npwp" onclick="getFile()"></label>
                                                        <label class="icon" for="npwp"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">NPWP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                                <span>Ekstensi File Harus <strong>JPEG, PDF, PNG & JPG</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 is-ministry">
                                            <div class="form-group {{ $errors->has('siup ') ? 'has-error' : '' }}">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" name="siup" id="siup">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="siup" onclick="getFile()"></label>
                                                        <label class="icon" for="siup"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">SIUP/akta pendirian organisasi/lainnya</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                                @if($errors->has('siup'))
                                                    <p style="color:red;">{{ $errors->first('siup') }}</p>
                                                @endif
                                                <span>Ekstensi File Harus <strong>JPEG, PDF, PNG & JPG</strong></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" id="no_telp" name="no_telp" type="number">
                                                    <label class="text-label">Nomor telepon</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-goverment">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" id="email" name="email" type="email">
                                                    <label class="text-label">Alamat email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <textarea class="form-control required" name="purpose_objectives" id="" cols="30" rows="10"></textarea>
                                                    <label class="text-label">Maksud dan tujuan</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" name="time_period">
                                                        <option></option>
                                                        <option value="1">1 tahun</option>
                                                        <option value="2">2 tahun</option>
                                                        <option value="3">3 tahun</option>
                                                        <option value="4">4 tahun</option>
                                                        <option value="5">5 tahun</option>
                                                    </select>
                                                    <label class="text-label">Usulan jangka waktu</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <textarea name="background" id="background" cols="30" rows="10" class="form-control required"></textarea>
                                                    <label class="text-label">Latar belakang</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload required extension" type="file" id="agency_profile" name="agency_profile">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="agency_profile" onclick="getFile()"></label>
                                                        <label class="icon" for="agency_profile"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">Profil instansi</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                                <span>Ekstensi File Harus <strong>JPEG, PDF, PNG & JPG</strong></span>
                                                @if($errors->has('agency_profile'))
                                                    <p style="color:red;">{{ $errors->first('agency_profile') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group {{ $errors->has('proposal') ? 'has-error' : '' }}">
                                                <div class="form-input input-file">
                                                    <input class="upload required extension" type="file" id="proposal" name="proposal">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="proposal" onclick="getFile()"></label>
                                                        <label class="icon" for="proposal"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">Proposal</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                                @if($errors->has('proposal'))
                                                    <p style="color:red;">{{ $errors->first('proposal') }}</p>
                                                @endif
                                                <span>Ekstensi File Harus <strong>JPEG, PDF, PNG, JPG & MP4</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-btn">3</div>
                            <div id="step3" class="tab-pane">
                                <div class="main-title text-center">
                                    <h4 class="title">Unit yang akan terlibat</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                @foreach ($data['deputi'] as $item)
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="{{ $item['id'] }}" name="deputi[]" value="{{ $item['id'] }}">
                                                        <label for="{{ $item['id'] }}">{{ $item['name'] }}</label>
                                                    </div>
                                                @endforeach
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
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeBwT8ZlyiYyOMHt-jpeVQWVtwEoS_UI&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function initAutocomplete() {
            var mapstyles = [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]
            var map = new google.maps.Map(document.getElementById('loc-result'), {
                center: {lat:  -1.514896, lng: 120.3647036},
                zoom: 4,
                styles: mapstyles,
            });
            var input = document.getElementById('loc-search');
            var searchBox = new google.maps.places.SearchBox(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                for (var i = 0; i < places[0].address_components.length; i++) {
                    for (var j = 0; j < places[0].address_components[i].types.length; j++) {
                        if (places[0].address_components[i].types[j] == "postal_code") {
                            $('#postal_code').val(`${places[0].address_components[i].long_name}`);
                        }
                    }
                }
                $('#loc-search').val(`${places[0].name}`);
                $('#addressLabel').val(`${places[0].formatted_address}`);
                $('#latitudeLabel').val(`${places[0].geometry.location.lat()}`);
                $('#longitudeLabel').val(`${places[0].geometry.location.lng()}`);
                $('#address').val(`${places[0].formatted_address}`);
                $('#latitude').val(`${places[0].geometry.location.lat()}`);
                $('#longitude').val(`${places[0].geometry.location.lng()}`);

                if (places.length == 0) {
                    return;
                }
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var markerIcon = '/images/marker-icon.svg';
                    /*
                    var icon = {
                        url: markerIcon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    */
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: markerIcon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        const form = $('#submission-cooperation').show();
        $("#step-pengajuan").steps({
        headerTag: ".step-btn",
        bodyTag: ".tab-pane",
        titleTemplate: "#title#",
        transitionEffect: "slideLeft",
        saveState: true,
        onStepChanging: function (event, currentIndex, newIndex)
        {
            console.log(1);
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
            form.validate({
                rules: {
                    agency_profile: {
                        required: true,
                        extension: "jpeg|pdf|png|jpg",
                        filesize: 3000000,
                    },
                    proposal: {
                        required: true,
                        extension: "jpeg|pdf|png|jpg|mp4",
                        filesize: 3000000,
                    },
                },
                errorPlacement: function (error, element) {
                    console.log(error);
                    console.log(element);
                    const config = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "0",
                        "extendedTimeOut": "0",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr.warning('Harap Perhatikan Ukuran File Yang di Upload (Maks.2MB)', 'Perhatian!', config);
                }
            }).settings.ignore = ":disabled,:hidden";

            // Start validation; Prevent going forward if false
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {
            console.log(2);
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

            toastr.warning('Harap Perhatikan Ukuran File Yang di Upload (Maks.2MB)', 'Perhatian!', config);
        },
        onFinished: function (event, currentIndex)
        {
            $('#submission-cooperation').submit();
        }
        });
    </script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod('filesize', function(value, element, param) {
              return this.optional(element) || (element.files[0].size <= param)
            }, 'File size must be less than {0} Kb');
            $('.select2').select2({
                width: '100%',
                placeholder: 'Pilih dan Sesuaikan',
            });
            // var geocoder = new google.maps.Geocoder();

            $('#type_of_cooperation_one_derivative_id').change(function(e) {
                const value = $(this).val();
                if(value == 2) {
                    $('.is-indonesian').show();
                    $('#countries_id').val('');
                    $('#province_id').val('');
                    $('#regency_id').val('');
                    $('#countries_id').html('');
                    $('#province_id').html('');
                    $('#regency_id').html('');

                    $.ajax({
                        url: `/ajax/typetwo/${value}`,
                        method: `GET`,
                        success: function(response) {
                            let typeTwo = `<option value="">- Pilih dan Sesuaikan -</option>`;
                            let countryTwo = `<option value="">- Pilih dan Sesuaikan -</option>`;
                            let provinceTwo = `<option value="">- Pilih dan Sesuaikan -</option>`;

                            const type = response.data.type;
                            const country = response.data.country;
                            const province = response.data.province;

                            $.map(type, function (value, index) {
                                typeTwo += `<option value="${value.id}">${value.name}</option>`;
                            });

                            $.map(country, function (value, index) {
                                countryTwo += `<option value="${value.id}">${value.country_name}</option>`;
                            });

                            $.map(province, function (value, index) {
                                provinceTwo += `<option value="${value.id}">${value.name}</option>`;
                            });

                            $('#countries_id').html(countryTwo);
                            $('#countries_id').val(102).trigger('change');
                            // $('#countries_id').val('102').trigger('change');
                            // geocoder.geocode( { 'address': 'Indonesia'}, function(results, status) {
                            //     if (status == google.maps.GeocoderStatus.OK) {
                            //         map.setCenter(results[0].geometry.location);
                            //         if (results[0].geometry.viewport)
                            //         map.fitBounds(results[0].geometry.viewport);
                            //     } else {
                            //         alert("Geocode was not successful for the following reason: " + status);
                            //     }
                            // });
                            $('#province_id').html(provinceTwo);
                            $('#type_of_cooperation_two_derivative_id').html(typeTwo);
                        }
                    })
                } else {
                    $('#is-not-mou').hide();
                    $('#is-not-mou').val('');
                    $('.is-indonesian').hide();
                    $('#province_id').val('');
                    $('#regency_id').val('');
                    $('#countries_id').val('');
                    $('#countries_id').html('');
                    $('#province_id').html('');
                    $('#regency_id').html('');

                    $.ajax({
                        url: `/ajax/typetwo/${value}`,
                        method: `GET`,
                        success: function(response) {
                            let typeTwo = `<option value="">- Pilih dan Sesuaikan -</option>`;
                            let countryTwo = `<option value="">- Pilih dan Sesuaikan -</option>`;

                            const type = response.data.type;
                            const country = response.data.country;

                            $.map(type, function (value, index) {
                                typeTwo += `<option value="${value.id}">${value.name}</option>`;
                            });

                            $.map(country, function (value, index) {
                                countryTwo += `<option value="${value.id}">${value.country_name}</option>`;
                            });

                            $('#countries_id').html(countryTwo);
                            $('#type_of_cooperation_two_derivative_id').html(typeTwo);
                        }
                    })
                }
            })
            $('#type_of_cooperation_two_derivative_id').change(function(e) {
                const value = $(this).val();

                if(value == 3 || value == 4) {
                    $('#is-not-mou').show();
                    $('#submission_proposal_guest_id').attr('class', 'form-control select2 required');
                    $('.select2').select2({
                        width: '100%',
                        placeholder: 'Pilih dan Sesuaikan',
                    });
                } else {
                    $('#is-not-mou').hide();
                    $('#submission_proposal_guest_id').val('');
                    $('#submission_proposal_guest_id').attr('class', 'form-control select2');
                    $('.select2').select2({
                        width: '100%',
                        placeholder: 'Pilih dan Sesuaikan',
                    });
                    // $('#agencies_id').val('');
                    // $('#loc-search').val('');
                    // $('#address').val('');
                    // $('#addressLabel').val('');
                    // $('#latitude').val('');
                    // $('#latitudeLabel').val('');
                    // $('#longitudeLabel').val('');
                    // $('#longitude').val('');
                    // $('#name').val('');
                    // $('#department').val('');
                    // $('#no_telp').val('');
                    // $('#background').val('');
                    // $('#countries_id').val('');
                    // $('#province_id').val('');
                    // $('#regency_id').val('');
                }
            });
            $('#submission_proposal_guest_id').change(function(e) {
                const value = $(this).val();

                $.ajax({
                    url: `/ajax/show/mou/success/${value}`,
                    method: `GET`,
                    success: function(response) {
                        $('#agencies_id').val(response.data.agencies_id).trigger('change');
                        $('#countries_id').val(response.data.countries_id);
                        $('#province_id').val(response.data.province_id).trigger('change');
                        $('#loc-search').val(response.data.agency_name);
                        $('#address').val(response.data.address);
                        $('#addressLabel').val(response.data.address);
                        $('#latitude').val(response.data.latitude);
                        $('#latitudeLabel').val(response.data.latitude);
                        $('#longitudeLabel').val(response.data.longitude);
                        $('#longitude').val(response.data.longitude);
                        $('#name').val(response.data.name);
                        $('#department').val(response.data.department);
                        $('#no_telp').val(response.data.no_telp);
                        $('#background').val(response.data.background);
                        $('#postal_code').val(response.data.postal_code);
                        $('#email').val(response.data.email);
                        setTimeout(function(){
                            $('#regency_id').val(response.data.regency_id).trigger('change');
                        }, 1000);
                    },
                })
            });
            $('#countries_id').change(function(e) {
                const value = $(this).val();
                const text = $("#countries_id option:selected").text();
                if(value == 102) {
                    $('.is-indonesian').show();
                    $.ajax({
                        url: `/ajax/province/${value}`,
                        method: 'GET',
                        success: function(response) {
                            let province = `<option value="">- Pilih dan Sesuaikan -</option>`;

                            const data = response.data;

                            $.map(data, function (value, index) {
                                province += `<option value="${value.id}">${value.name}</option>`;
                            });

                            $('#province_id').html(province);
                        }
                    })
                } else {
                    $('.is-indonesian').hide();
                    $('#province_id').html('');
                    $('#province_id').val('');
                    $('#regency_id').html('');
                    $('#regency_id').val('');
                }
                // geocoder.geocode( { 'address': text}, function(results, status) {
                //     if (status == google.maps.GeocoderStatus.OK) {
                //         map.setCenter(results[0].geometry.location);
                //         if (results[0].geometry.viewport)
                //         map.fitBounds(results[0].geometry.viewport);
                //     } else {
                //         alert("Geocode was not successful for the following reason: " + status);
                //     }
                // });
            });
            $('#province_id').change(function(e) {
                const value = $(this).val();

                $.ajax({
                    url: `/ajax/regency/${value}`,
                    method: `GET`,
                    success: function(response) {
                        let regency = `<option value="">- Pilih dan Sesuaikan -</option>`;

                        const data = response.data;

                        $.map(data, function (value, index) {
                            regency += `<option value="${value.id}">${value.name}</option>`;
                        });

                        $('#regency_id').html(regency);
                    }
                })
            });
            $('#agencies_id').change(function() {
                const value = $(this).val();

                $.ajax({
                    url: '/agency/check/goverment/' + value,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        console.log(response.data.status);
                        if(response.data.status == 1) {
                            $('.is-ministry').hide();
                            $('#npwp').attr("class", "upload");
                            $('#siup').attr("class", "upload");
                            $('#is-goverment').attr("class", "col-lg-12 col-md-12")
                        } else {
                            $('.is-ministry').show();
                            $('#npwp').attr("class", "upload required");
                            $('#siup').attr("class", "upload required");
                            $('#is-goverment').attr("class", "col-lg-6 col-md-6")
                        }
                    }
                })

            });
            // $('#nominal').keyup(function(event) {
            //     // skip for arrow keys
            //     if(event.which >= 37 && event.which <= 40) return;

            //     // format number
            //     $(this).val(function(index, value) {
            //     return value
            //     .replace(/\D/g, "")
            //     .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            //     ;
            //     });
            // });
        });
    </script>
@endsection
