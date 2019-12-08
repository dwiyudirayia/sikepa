@extends('layouts.layout-single')
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
                                    <div class="stats-val">
                                        150
                                    </div>
                                    <div class="stats-label">
                                        Total Kerjasama<br>Dalam Negri
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="stats">
                                    <div class="stats-val">
                                        87
                                    </div>
                                    <div class="stats-label">
                                        Total Kerjasama<br>Luar Negri
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="stats-filter">
                                    <a class="btn btn-primary" data-toggle="modal" href="#map-filter"><i class="mdi mdi-tune"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap" id="search-result">
        <div class="container">
            <div class="main-title text-center sr-btm">
                <h3 class="title">Hasil pencarian</h3>
            </div>
            <table class="table table-striped sr-btm">
                <thead>
                    <tr>
                        <th>Jenis kerjasama</th>
                        <th>Instansi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td title="Jenis kerjasama">Jenis kerjasama</td>
                        <td title="Instansi">Instansi</td>
                        <td><a class="link" href="#!">Lihat Mou</a></td>
                    </tr>
                    <tr>
                        <td title="Jenis kerjasama">Jenis kerjasama</td>
                        <td title="Instansi">Instansi</td>
                        <td><a class="link" href="#!">Lihat Mou</a></td>
                    </tr>
                    <tr>
                        <td title="Jenis kerjasama">Jenis kerjasama</td>
                        <td title="Instansi">Instansi</td>
                        <td><a class="link" href="#!">Lihat Mou</a></td>
                    </tr>
                    <tr>
                        <td title="Jenis kerjasama">Jenis kerjasama</td>
                        <td title="Instansi">Instansi</td>
                        <td><a class="link" href="#!">Lihat Mou</a></td>
                    </tr>
                    <tr>
                        <td title="Jenis kerjasama">Jenis kerjasama</td>
                        <td title="Instansi">Instansi</td>
                        <td><a class="link" href="#!">Lihat Mou</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('scripts')
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeBwT8ZlyiYyOMHt-jpeVQWVtwEoS_UI&callback=initMap"></script>
<script>
    var mHeader = $(".main-header").outerHeight();
    $(".map-wrapper").css("padding-top",""+mHeader+"px");
    function initMap(){
        var mapstyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            styles: mapstyles,
            center: {lat:-1.756621,lng:120.2340168},
            disableDefaultUI: true
        });
        var labels = '';
        var markerIcon = 'images/marker-icon.svg';
        var markers = locations.map(function(location, i) {
            return new google.maps.Marker({
                position: location,
                label: labels[i % labels.length],
                icon: markerIcon
            });
        });

        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        
        markers.addListener('click', function() {
            map.setCenter(markers.getPosition());
          });
    }
    var locations = [
        {lat:-6.9034482,lng:107.6081381},
        {lat:-6.2297419,lng:106.759478},
    ]
    

</script>
@endsection