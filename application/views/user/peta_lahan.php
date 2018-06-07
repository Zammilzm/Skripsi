<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?= base_url('favicon.ico') ?>"/>
    <title>PG ASEMBAGUS</title>
    <link href="<?= base_url('assets/css/sandstone-bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/general.css') ?>" rel="stylesheet"/>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID&libraries=places"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-floyd.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-helper.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/plugins/fontawesome/css/font-awesome.min.css">
</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="text-size-40 text-loose">Mitra Tani</span><br>
                <span class="text-size-18 text-grey">Perusahaan Gula</span><br>
                <span class="text-size-24 text-grey">PG ASEMBAGUS</span>
            </div>
            <div class="sidebar-avatar">
                <div class="sidebar-avatar-image"><img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>"
                                                       alt="" class="img-circle"></div>
                <div class="sidebar-avatar-text">Mitra</div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
                <li><a href="<?= site_url('Member/index') ?>"><i class="fa  fa-star"></i><span>Home</span></a></li>
                <li><a href="<?= site_url('Member/profil') ?>"><i
                                class="fa fa-user-md"></i><span>Profil</span></a></li>
                <li>
                    <a href="#nav-dropdown1" data-toggle="collapse" aria-controls="nav-dropdown1">
                        <i class="fa fa-fw fa-window-maximize"></i><span>Cari Lahan</span>
                        <span class="sidebar-nav-arrow"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sidebar-nav-child collapse collapseable" id="nav-dropdown1">
                        <li><a href="<?= site_url('Alternatif/lahan_user') ?>"><i class="fa  fa-star"></i><span>Peringkat Lahan</span></a>
                        </li>
                        <li><a href="<?= site_url('Alternatif/tampil_peta') ?>"><i class="fa fa-star"></i><span>Lokasi Lahan</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?= site_url('Kontrak/list_status_booking') ?>"><i class="fa fa-book"></i><span>Lahan User</span></a>
                </li>
                <li><a href="<?= site_url('Panen') ?>"><i class="fa fa-pencil-square"></i><span>Data Panen</span></a>
                </li>
                <li><a href="<?= site_url('user/logout') ?>"><i class="fa fa-wrench"></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="main-panel">
        <div id="top-nav">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!-- Navbar toggle button -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                                aria-expanded="false">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Sidebar toggle button -->
                        <button type="button" class="sidebar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> LETAK LAHAN
                            BERDASARKAN LOKASI ANDA</a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="content">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div id="map" style="height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>
<script>
    var defaultCenter = {
        lat: -9.5235235864973005,
        lng: 111.39712464062495
    };

    function tampilDekat() {
        map_dekat = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: defaultCenter
        });

        var infoWindowLokasi = new google.maps.InfoWindow({
            content: '<h4>Lokasi Anda</h4>'
        });

        var markerLokasi = new google.maps.Marker({
            position: defaultCenter,
            map: map_dekat,
            title: 'Lokasi Anda',
            icon: 'https://maps.google.com/mapfiles/kml/paddle/grn-circle.png'
        });

        //console.log(markerLokasi);

        // Try HTML5 geolocation.
        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(function (position) {
                defaultCenter = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                infoWindowLokasi.setPosition(defaultCenter);
                map_dekat.setCenter(defaultCenter);
                markerLokasi.setPosition(defaultCenter);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        infoWindowLokasi.open(map_dekat, markerLokasi);

        var base_url = '<?=site_url()?>';
        var data = <?=json_encode($rows)?>;
        $.each(data, function (k, v) {
            var pos = {
                lat: parseFloat(v.lat),
                lng: parseFloat(v.lng)
            };
            var contentString = '<h3>' + v.nama_alternatif + '</h3>' +
                '<p align="center"><a href="' + base_url + '/alternatif/detail/' + v.kode_alternatif + '" class="link_detail btn btn-primary">Lihat Detail</a>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var marker = new google.maps.Marker({
                position: pos,
                map: map_dekat,
                animation: google.maps.Animation.DROP
            });
            marker.addListener('click', function () {
                infowindow.open(map_dekat, marker);
            });
        });
    }

    $(function () {
        tampilDekat();
    })
</script>
</body>
</html>

