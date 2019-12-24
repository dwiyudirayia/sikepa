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
                                    <h4 class="title">Formulir Jenis Kerjasama</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input type="text" class="form-control required" id="title_cooperation" name="title_cooperation">
                                                    <label class="text-label">Usulan Judul Kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="type_guest_id" name="type_guest_id">
                                                        <option value=""></option>
                                                        @foreach ($data['type'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="text-label">Jenis</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-fund">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="type_of_cooperation_id" name="type_of_cooperation_id">
                                                        <option></option>
                                                    </select>
                                                    <label class="text-label">Jenis kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-typeof-one">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" id="type_of_cooperation_one_derivative_id" name="type_of_cooperation_one_derivative_id">
                                                    </select>
                                                    <label class="text-label">Permohonan kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-nominal">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control" name="nominal" id="nominal" type="text">
                                                    <label class="text-label">Nominal</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-typeof-two">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2" id="type_of_cooperation_two_derivative_id" name="type_of_cooperation_two_derivative_id">
                                                        <option></option>
                                                        <option>Perjanjian kerjasama</option>
                                                        <option>Perpanjangan MOU/PKS</option>
                                                        <option>Lain-lain</option>
                                                    </select>
                                                    <label class="text-label">Kesepahaman kerjasama</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <select class="form-control select2 required" id="agencies_id" name="agencies_id">
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
                                    <h4 class="title">Formulir Biodata Pemohon/Instansi</h4>
                                </div>
                                <div class="control-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" name="nama" id="nama" type="text">
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
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload required" id="ktp" type="file" name="ktp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="ktp" onclick="getFile()"></label>
                                                        <label class="icon" for="ktp"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">KTP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload required" type="file" id="npwp" name="npwp">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="npwp" onclick="getFile()"></label>
                                                        <label class="icon" for="npwp"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">NPWP Pemohon</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6" id="is-ministry">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload" type="file" name="siup" id="siup">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="siup" onclick="getFile()"></label>
                                                        <label class="icon" for="siup"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">SIUP/akta pendirian organisasi/lainnya</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
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
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <input class="form-control required" id="email" name="email" type="email">
                                                    <label class="text-label">Alamat email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <div class="form-input">
                                                    <textarea class="form-control required" name="purpose_objectives" id="" cols="30" rows="10"></textarea>
                                                    <label class="text-label">Maksud dan tujuan</label>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input class="upload required" type="file" id="agency_profile" name="agency_profile">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="agency_profile" onclick="getFile()"></label>
                                                        <label class="icon" for="agency_profile"><i class="mdi mdi-upload"></i></label>
                                                    </div>
                                                    <label class="text-label">Profil instansi</label>
                                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-input input-file">
                                                    <input class="upload required" type="file" id="proposal" name="proposal">
                                                    <div class="form-control">
                                                        <label class="input-upload" for="proposal" onclick="getFile()"></label>
                                                        <label class="icon" for="proposal"><i class="mdi mdi-upload"></i></label>

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeBwT8ZlyiYyOMHt-jpeVQWVtwEoS_UI&libraries=places"></script>
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
                    var markerIcon = '/assets/images/marker-icon.svg';
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
            $('#submission-cooperation').submit();
        }
        });
    </script>
    <script>
        $(document).ready(function() {
            initAutocomplete();
            var mapstyles = [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]
            var map = new google.maps.Map(document.getElementById('loc-result'), {
                center: {lat:  -1.514896, lng: 120.3647036},
                zoom: 4,
                styles: mapstyles,
            });
            $('.select2').select2({
                width: '100%',
                placeholder: 'Pilih dan Sesuaikan',
            });
            var geocoder = new google.maps.Geocoder();
            $('#type_guest_id').change(function() {
                const value = $(this).val();
                $.ajax({
                    url: `/ajax/type/${value}`,
                    method: 'GET',
                    success: function(response) {
                        $('#type_of_cooperation_id').html('');
                        $('#type_of_cooperation_one_derivative_id').html('');
                        $('#type_of_cooperation_two_derivative_id').html('');

                        $('#type_of_cooperation_id').val('');
                        $('#type_of_cooperation_one_derivative_id').val('');
                        $('#type_of_cooperation_two_derivative_id').val('');
                        let type = `<option value="">- Pilih dan Sesuaikan -</option>`;

                        const data = response.data;

                        $.map(data, function (value, index) {
                            type += `<option value="${value.id}">${value.name}</option>`;
                        });

                        $('#type_of_cooperation_id').html(type);
                    }
                })
            });
            $('#type_of_cooperation_id').change(function() {
                const value = $(this).val();

                if(value == 1 || value == 2) {
                    $('#is-nominal').show();
                    $('#is-typeof-one').hide();
                    $('#is-typeof-two').hide();
                    $('#is-fund').attr('class', 'col-lg-12 col-md-12');
                    $('#is-nominal').attr('class', 'col-lg-12 col-md-12');
                    $('#is-typeof-one').attr('class', 'col-lg-12 col-md-12');
                    $('#type_of_cooperation_one_derivative_id').val('');
                    $('#type_of_cooperation_one_derivative_id').html('');
                    $('#type_of_cooperation_two_derivative_id').val('');
                    $('#type_of_cooperation_two_derivative_id').html('');
                } else {
                    $('#is-nominal').hide();
                    $('#is-typeof-one').show();
                    $('#is-typeof-two').show();
                    $('#is-typeof-two').attr('class', 'col-lg-12 col-md-12');
                    $('#nominal').val('');
                    $('#type_of_cooperation_one_derivative_id').val('');
                    $('#type_of_cooperation_one_derivative_id').html('');
                    $('#type_of_cooperation_two_derivative_id').val('');
                    $('#type_of_cooperation_two_derivative_id').html('');
                }

                $.ajax({
                    url: `/ajax/typeone/${value}`,
                    method: 'GET',
                    success: function(response) {
                        let typeOne = `<option value="">- Pilih dan Sesuaikan -</option>`;

                        const data = response.data;

                        $.map(data, function (value, index) {
                            typeOne += `<option value="${value.id}">${value.name}</option>`;
                        });

                        $('#type_of_cooperation_one_derivative_id').html(typeOne);
                    }
                })
            });

            $('#type_of_cooperation_one_derivative_id').change(function(e) {
                const value = $(this).val();
                if(value == 3 || value == 4) {
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
                            $('#countries_id').val('102');
                            geocoder.geocode( { 'address': 'Indonesia'}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    map.setCenter(results[0].geometry.location);
                                    if (results[0].geometry.viewport)
                                    map.fitBounds(results[0].geometry.viewport);
                                } else {
                                    alert("Geocode was not successful for the following reason: " + status);
                                }
                            });
                            $('#province_id').html(provinceTwo);
                            $('#type_of_cooperation_two_derivative_id').html(typeTwo);
                        }
                    })
                } else {
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
                geocoder.geocode( { 'address': text}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if (results[0].geometry.viewport)
                        map.fitBounds(results[0].geometry.viewport);
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            });
            $('#province_id').change(function(e) {
                const value = $(this).val();
                const text = $("#province_id option:selected").text();
                geocoder.geocode( { 'address': text}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if (results[0].geometry.viewport)
                        map.fitBounds(results[0].geometry.viewport);
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });

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
            $('#regency_id').change(function(){
                const text = $("#province_id option:selected").text();
                geocoder.geocode( { 'address': text}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if (results[0].geometry.viewport)
                        map.fitBounds(results[0].geometry.viewport);

                        map.setZoom(10);
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            });
            $('#agencies_id').change(function() {
                const value = $(this).val();

                if(value == 1) {
                    $('#is-ministry').hide();
                } else {
                    $('#is-ministry').show();
                }

            });
            $('#nominal').keyup(function(event) {
                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40) return;

                // format number
                $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                ;
                });
            });
        });
    </script>
@endsection
