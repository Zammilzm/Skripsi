<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 03/03/2018
 * Time: 22:40
 */
?>
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
    <style>
        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        #map {
            height: 500px;
            float: left;
            width: 63%;
        }
        #right-panel {
            float: right;
            width: 34%;
            height: 500px;
            overflow: auto;
        }
        .panel {
            height: 500px;
            overflow: auto;
        }
    </style>
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
                <li><a href="<?= site_url('Member/index') ?>"><i class="fa fa-fw fa-star"></i><span>Home</span></a></li>
                <li><a href="<?= site_url('Member/profil') ?>"><i class="fa fa-fw fa-user-md"></i><span>Profil</span></a></li>
                <li><a href="<?= site_url('Kontrak/list_status_booking') ?>"><i class="fa fa-fw fa-user-circle"></i><span>Lahan Mitra</span></a>
                </li>
                <li>
                    <a href="#nav-dropdown1" data-toggle="collapse" aria-controls="nav-dropdown1">
                        <i class="fa fa-fw fa-window-maximize"></i><span>Cari Lahan</span>
                        <span class="sidebar-nav-arrow"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sidebar-nav-child collapse collapseable" id="nav-dropdown1">
                        <li><a href="<?= site_url('Alternatif/lahan_user') ?>"><i class="fa fa-fw fa-star"></i><span>Peringkat Lahan</span></a>
                        </li>
                        <li><a href="<?= site_url('Alternatif/tampil_peta') ?>"><i class="fa fa-fw fa-star"></i><span>Lokasi Lahan</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?=site_url('Kontrak/list_status_booking')?>"><i class="fa fa-fw fa-book"></i><span>Lahan User</span></a></li>
                <li><a href="<?= site_url('user/logout') ?>"><i class="fa fa-fw fa-wrench"></i><span>Logout</span></a>
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
                        <div class="clearfix" style="background: white;">
                            <div id="map"></div>
                            <div id="right-panel">
                                <p>Total Jarak: <span id="total"></span><br />
                                    Node Terdekat: <span id="terdekat"></span></p>
                            </div>
                        </div>
                        <p class="help-block">Geser marker atau garis untuk mengubah rute.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>
<script>
    var pos = {
        lat : -9.5235235864973005,
        lng : 111.39712464062495
    };

    $(function(){
        initMap();
    })

    var markerArray = [];

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: pos  // Australia.
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: true,
            map: map,
            panel: document.getElementById('right-panel')
        });

        var stepDisplay = new google.maps.InfoWindow;


        directionsDisplay.addListener('directions_changed', function() {
            //calculateAndDisplayRoute()
            computeTotalDistance(directionsDisplay.getDirections());
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(null);
            }

            showSteps(directionsDisplay.getDirections(), markerArray, stepDisplay, map);
            //calculateAndDisplayRoute(pos, {lat: -8.372245, lng: 115.102754}, directionsService, directionsDisplay, stepDisplay, map);
        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                //map.setCenter(pos);
                calculateAndDisplayRoute(pos, {lat: <?=$row->lat?>, lng: <?=$row->lng?>}, directionsService, directionsDisplay, stepDisplay, map);
            }, function() {
                calculateAndDisplayRoute(pos, {lat: <?=$row->lat?>, lng: <?=$row->lng?>}, directionsService, directionsDisplay, stepDisplay, map);
            });
        } else {
            // Browser doesn't support Geolocation
            calculateAndDisplayRoute(pos, {lat: <?=$row->lat?>, lng: <?=$row->lng?>}, directionsService, directionsDisplay, stepDisplay, map);
        }
    }

    function calculateAndDisplayRoute(origin, destination, directionsService, directionsDisplay, stepDisplay, map) {

        for (var i = 0; i < markerArray.length; i++) {
            markerArray[i].setMap(null);
        }

        directionsService.route({
            origin: origin,
            destination: destination,
            //waypoints: [{location: 'Adelaide, SA'}, {location: 'Broken Hill, NSW'}],
            travelMode: 'DRIVING',
            avoidTolls: true
        }, function(response, status) {
            if (status === 'OK') {
                //console.log(response);
                directionsDisplay.setDirections(response);
                showSteps(response, markerArray, stepDisplay, map);
            } else {
                alert('Could not display directions due to: ' + status);
            }
        });
    }

    function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];

        //console.log(directionResult.routes[0].legs[0]);

        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = markerArray[i] = markerArray[i] || new google.maps.Marker();
            //marker.setMap(map);
            //marker.setPosition(myRoute.steps[i].start_location);
            //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
            attachInstructionText(
                stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
    }

    function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
            // Open an info window when the marker is clicked on, containing the text
            // of the step.
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
    }

    function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        var terdekat = 0;

        terdekat = myroute.legs[0].steps[0].distance.value;

        //console.log(result);
        for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
        document.getElementById('terdekat').innerHTML = (terdekat / 1000) + ' km';// + terdekat + ' m';
    }
</script>
</body>
</html>


