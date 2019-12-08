@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Kontak Kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row no-gutter block-media-text">
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media">
                        <div class="box-media">
                            <div class="thumb" id="map-canvas"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Kontak kami</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <ul class="list-contact">
                                <li><span class="text-label">Alamat</span><br><b>Jl. Batu Indah I No.6, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40266</b></li>
                                <li><span class="text-label">Telp</span><br><b>0812-3456-7890</b></li>
                                <li><span class="text-label">Email</span><br><b><a href="#!"><span class="hover-line">info@sikepa.id</span></a></b></li>
                                <li>
                                    <ul class="social-icon">
                                        <li><a href="#!" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                                        <li><a href="#!" title="Twitter"><i class="mdi mdi-twitter"></i></a></li>
                                        <li><a href="#!" title="Instagram"><i class="mdi mdi-instagram"></i></a></li>
                                        <li><a href="#!" title="Google +"><i class="mdi mdi-google"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-wrap pt0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <div class="main-title text-center aos-init aos-animate" data-aos="zoom-out-up">
                        <div class="subtitle">Kontak Kami</div>
                        <h3 class="title">Kirim Pesan &amp; Saran</h3>
                    </div>
                    <form>
                        <div class="form-group sr-btm">
                            <div class="form-input">
                                <input class="form-control" required="">
                                <label class="text-label">Nama Lengkap</label>
                            </div>
                        </div>
                        <div class="form-group sr-btm">
                            <div class="form-input">
                                <input class="form-control" required="">
                                <label class="text-label">Alamat Email</label>
                            </div>
                        </div>
                        <div class="form-group sr-btm">
                            <div class="form-input">
                                <input class="form-control" required="">
                                <label class="text-label">Pesan</label>
                            </div>
                        </div>
                        <div class="caption-btn text-right sr-btm">
                            <button class="link-icon" type="submit">Kirim pesan<i class="mdi mdi-play"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/maplace.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfeBwT8ZlyiYyOMHt-jpeVQWVtwEoS_UI"></script>
    <script>

        //maplace
        $(document).ready(function () {
            var mapStyle = [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]
            var LocA = [{
                lat: -6.3193176,
                lon: 106.9833145,
                icon: '/assets/images/marker-icon.svg',
                show_infowindow: false,
            }]
            new Maplace({
                locations: LocA,
                map_div: "#map-canvas",
                controls_on_map: false,
                map_options: {
                    scrollwheel: false,
                    styles: mapStyle,
                    //draggable: false,
                    zoom: 14
                }
            }).Load();
        });

    </script>
@endsection
