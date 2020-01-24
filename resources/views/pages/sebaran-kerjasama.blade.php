@extends('layouts.layout-single')
@section('styles2')
    <link rel="stylesheet" href="{{ asset('css/chart.min.css') }}"/>
@endsection
@section('content')
    <section class="map-wrapper">
        <div id="map" class="map"></div>
        <div class="map-info sr-btm">
            <div class="container">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row list-stats">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="stats">
                                    <div class="stats-val" id="domestic">
                                        {{-- {{ $data['approval_guest_domestic'] + $data['approval_guest_domestic_guest']}} --}}
                                    </div>
                                    <div class="stats-label" id="domestic">
                                        Total Kerjasama<br>Dalam Negri
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="stats">
                                    <div class="stats-val" id="overseas">
                                        {{-- {{ $data['approval_guest_overseas'] + $data['approval_guest_overseas_guest'] }} --}}
                                    </div>
                                    <div class="stats-label">
                                        Total Kerjasama<br>Luar Negri
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="stats-filter">
                                    <button class="btn btn-secondary" style="margin-bottom: 10px" id="reset-filter"><i class="mdi mdi-reload"></i></button>
                                    <button class="btn btn-primary" data-toggle="modal" href="#map-filter"><i class="mdi mdi-tune"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-wrap">
        <div class="container">
            <div class="main-title text-center sr-btm">
                <h3 class="title">Grafik Pengajuan Kerjasama</h3>
            </div>
            <canvas id="myChart" width="400" height="100"></canvas>
        </div>
    </section>
    <section class="content-wrap">
        <div class="container">
            <div class="main-title text-center sr-btm">
                <h3 class="title" id="title-table">Daftar Kerjasama KPPA</h3>
            </div>
            <table class="table table-striped sr-btm" id="table-data">
                <thead>
                    <tr>
                        <th>Judul MOU</th>
                        <th>Nama Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="is-search-table">
                    {{-- @forelse ($data['data'] as $item)
                        <tr>
                            <td title="Judul Kerjasama">{{ $item['title_cooperation'] }}</td>
                            <td title="Instansi">{{ $item['agency_name'] }}</td>
                            <td title="Aksi">{{ $item['agency_name'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="text-align:center;">Data Kosong</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-detail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title" id="judul-mou"></h5>
                                </div>
                                <a class="close" href="javascript:;" data-dismiss="modal"><i class="mdi mdi-close"></i></a>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="form-input">
                                            <input type="text" id="jenis-instansi" disabled class="form-control">
                                            <label class="text-label">Jenis Instansi</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-input">
                                            <input type="text" id="nama-instansi" disabled class="form-control">
                                            <label class="text-label">Nama Instansi</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-input">
                                            <input type="text" id="lama-pengajuan" disabled class="form-control">
                                            <label class="text-label">Lama Pengajuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="map-filter">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Filter</h5>
                                </div>
                                <a class="close" href="javascript:;" data-dismiss="modal"><i class="mdi mdi-close"></i></a>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="form-input">
                                            <select class="form-control" id="countries_id">
                                                <option value="">--Pilih Negara--</option>
                                                @foreach ($data['country'] as $item)
                                                    <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                                                @endforeach
                                            </select>
                                            <label class="text-label">Negara</label>
                                        </div>
                                    </div>
                                    <div class="form-group is-indonesian">
                                        <div class="form-input">
                                            <select class="form-control" id="province_id">
                                                <option></option>
                                                <option>Provinsi</option>
                                            </select>
                                            <label class="text-label">Provinsi</label>
                                        </div>
                                    </div>
                                    <div class="form-group is-indonesian">
                                        <div class="form-input">
                                            <select class="form-control" id="regency_id">
                                                <option></option>
                                                <option>Kota</option>
                                            </select>
                                            <label class="text-label">Kota</label>
                                        </div>
                                    </div>
                                    <button id="filter-umum" class="btn btn-lg btn-primary btn-block btn-rounded">Lihat Hasil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeBwT8ZlyiYyOMHt-jpeVQWVtwEoS_UI"></script>
<script src="{{ asset('js/oms.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
    function initMap(){
        axios.get('/map/distribution/cooperation').then((response) => {
            var clusterMarker = [];
            var mapstyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                styles: mapstyles,
                center: {lat:-1.756621,lng:120.2340168},
                disableDefaultUI: true
            });
            // var labels = '';
            // var markerIcon = 'images/marker-icon.svg';
            // var markers = locations.map(function(location, i) {
                //     return new google.maps.Marker({
                    //         position: location,
            //         label: labels[i % labels.length],
            //         icon: markerIcon
            //     });
            // });

            // var markerCluster = new MarkerClusterer(map, markers,
            //     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

            // markers.addListener('click', function() {
                //     map.setCenter(markers.getPosition());
                //   });

            const data = response.data.data;
            const chart = response.data.chart;

            var bounds = new google.maps.LatLngBounds();

            var infoWindow = new google.maps.InfoWindow();
            var oms = new OverlappingMarkerSpiderfier(map, {
                markersWontMove: true,   // we promise not to move any markers, allowing optimizations
                markersWontHide: true,   // we promise not to change visibility of any markers, allowing optimizations
                basicFormatEvents: true  // allow the library to skip calculating advanced formatting information
            });

            var infoWindowContent = data.map(content => {
                return [`
                    <tr>
                        <td>Judul MOU</b>
                        <td>:</td>
                        <td>${content.title_cooperation}</td>
                    </tr>
                    <tr>
                        <td>Instansi</b>
                        <td>:</td>
                        <td>${content.agencies.name}</td>
                    </tr>
                    <tr>
                        <td>Nama Instansi</b>
                        <td>:</td>
                        <td>${content.agency_name}</td>
                    </tr>
                `];
            });
            var markers = data.map((location, i) => {

                var position = new google.maps.LatLng(location.latitude, location.longitude);
                bounds.extend(position);

                marker = new google.maps.Marker({
                    icon: '/assets/images/marker-icon.svg',
                    position: {
                        lat: parseFloat(location.latitude),
                        lng: parseFloat(location.longitude)
                    },
                    title: location.nama_kelompok
                });
                google.maps.event.addListener(marker, 'spider_click', (function (marker, i) {
                    return function () {
                        infoWindow.setContent(`<table>${infoWindowContent[i]}</table>`);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
                map.fitBounds(bounds);
                oms.addMarker(marker);
                // needed to cluster marker
                clusterMarker.push(marker);
            });
            // Add a marker clusterer to manage the markers.
            new MarkerClusterer(map, clusterMarker, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                maxZoom: 15
            });

            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                map.setCenter(new google.maps.LatLng(-6.914744, 107.609810));
                this.setZoom(10);
                google.maps.event.removeListener(boundsListener);
            });

            let tableData = '';
            data.map(value => {
                tableData += `
                    <tr>
                        <td title="Judul Kerjasama">${value.title_cooperation}</td>
                        <td title="Instansi">${value.agency_name}</td>
                        <td title="Aksi">
                            <button
                                class="btn btn-primary icon-revealed"
                                id="show-modal-detail"
                                data-judul-mou="${value.title_cooperation}"
                                data-jenis-instansi="${value.agencies.name}"
                                data-nama-instansi="${value.agency_name}"
                                data-lama-pengajuan="${value.time_period}"
                            >
                                <span class="mdi mdi-eye"></span>
                            </button>
                        </td>
                    </tr>
                `
            })

            const overseas = data.filter(value => {
                return value.countries_id != 102;
            });
            const domestic = data.filter(value => {
                return value.countries_id == 102;
            });
            $('#overseas').html(overseas.length);
            $('#domestic').html(domestic.length);

            $('#title-table').html('Daftar Kerjasama KemenPPPA');
            $('#is-search-table').html(tableData);
            //chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jumlah Pengajuan Kerjasama'],
                    datasets: [
                        {
                            label: 'MOU',
                            data: [chart.mou.length + chart.mou_guest.length],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255, 206, 86, 0.2)',
                                // 'rgba(75, 192, 192, 0.2)',
                                // 'rgba(153, 102, 255, 0.2)',
                                // 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                // 'rgba(54, 162, 235, 1)',
                                // 'rgba(255, 206, 86, 1)',
                                // 'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Adendum',
                            data: [chart.adendum.length + chart.adendum_guest.length],
                            backgroundColor: [
                                // 'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                // 'rgba(255, 206, 86, 0.2)',
                                // 'rgba(75, 192, 192, 0.2)',
                                // 'rgba(153, 102, 255, 0.2)',
                                // 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                // 'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                // 'rgba(255, 206, 86, 1)',
                                // 'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Perpanjangan',
                            data: [chart.extension.length + chart.extension_guest.length],
                            backgroundColor: [
                                // 'rgba(255, 99, 132, 0.2)',
                                // 'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                // 'rgba(75, 192, 192, 0.2)',
                                // 'rgba(153, 102, 255, 0.2)',
                                // 'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                // 'rgba(255, 99, 132, 1)',
                                // 'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                // 'rgba(75, 192, 192, 1)',
                                // 'rgba(153, 102, 255, 1)',
                                // 'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    }
    function filterUmum(country_id, province_id, regency_id)
    {
        axios.get(`/map/distribution/cooperation/filter`, {
            params: {
                country_id: country_id,
                province_id: province_id,
                regency_id: regency_id
            }
        }).then((response) => {
            var clusterMarker = [];
            var map = new google.maps.Map(document.getElementById("map"));

            const data = response.data.data;

            var bounds = new google.maps.LatLngBounds();

            var infoWindow = new google.maps.InfoWindow();
            var oms = new OverlappingMarkerSpiderfier(map, {
                markersWontMove: true,   // we promise not to move any markers, allowing optimizations
                markersWontHide: true,   // we promise not to change visibility of any markers, allowing optimizations
                basicFormatEvents: true  // allow the library to skip calculating advanced formatting information
            });
            var infoWindowContent = data.map(content => {
                return [`
                    <tr>
                        <td>Nama Kelompok</b>
                        <td>:</td>
                        <td>${content.title_cooperation}</td>
                    </tr>
                `];
            });
            var markers = data.map((location, i) => {

                var position = new google.maps.LatLng(location.latitude, location.longitude);
                bounds.extend(position);

                marker = new google.maps.Marker({
                    icon: '/assets/images/marker-icon.svg',
                    position: {
                        lat: parseFloat(location.latitude),
                        lng: parseFloat(location.longitude)
                    },
                    title: location.nama_kelompok
                });
                google.maps.event.addListener(marker, 'spider_click', (function (marker, i) {
                    return function () {
                        infoWindow.setContent(`<table>${infoWindowContent[i]}</table>`);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
                map.fitBounds(bounds);
                oms.addMarker(marker);
                // needed to cluster marker
                clusterMarker.push(marker);
            });
            // Add a marker clusterer to manage the markers.
            new MarkerClusterer(map, clusterMarker, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
                maxZoom: 15
            });

            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
                map.setCenter(new google.maps.LatLng(-6.914744, 107.609810));
                this.setZoom(10);
                google.maps.event.removeListener(boundsListener);
            });
            let tableData = '';
            if(data.length == 0) {
                tableData = `
                    <tr>
                        <td colspan="2" style="text-align:center;">Data Kosong</td>
                    </tr>
                `
            } else {
                data.map(value => {
                    tableData += `
                        <tr>
                            <td title="Judul Kerjasama">${value.title_cooperation}</td>
                            <td title="Instansi">${value.agency_name}</td>
                        </tr>
                    `
                })
            }
            const overseas = data.filter(value => {
                return value.countries_id != 102;
            });
            const domestic = data.filter(value => {
                return value.countries_id == 102;
            });

            $('#overseas').html(overseas.length);
            $('#domestic').html(domestic.length);

            $('#title-table').html('Data Filter');
            $('#is-search-table').html(tableData);
        });
    }
    $(document).ready(function(e) {
        initMap();

        var mHeader = $(".main-header").outerHeight();
        $(".map-wrapper").css("padding-top",""+mHeader+"px");
        $('#countries_id').change(function(e) {
            const value = $(this).val();

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
        $('#filter-umum').click(function() {
            filterUmum($('#countries_id').val(),$('#province_id').val(),$('#regency_id').val());
        });
        $('#reset-filter').click(function() {
            initMap();
        })
        $('#table-data').on('click', '#show-modal-detail', function() {
            $('#modal-detail').modal('show');
            $('#judul-mou').html($(this).data('judul-mou'));
            $('#jenis-instansi').val($(this).data('jenis-instansi'));
            $('#nama-instansi').val($(this).data('nama-instansi'));
            $('#lama-pengajuan').val($(this).data('lama-pengajuan'));
        });
    })
    </script>
@endsection
