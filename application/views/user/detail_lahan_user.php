<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 28/02/2018
 * Time: 11:27
 */

?>

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
                <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> DETAIL LAHAN TERSEDIA</a>
            </div>
        </div>
    </nav>
</div>
<div id="content">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <p>GAMBAR LAHAN</p>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5 col-lg-5 " align="center">
                    <img width="300px" height="150px" class="thumbnail img-responsive" src="<?=base_url()?>assets/uploads/<?=$row->gambar1;?>">
                    <br>
                    <img width="300px" height="150px" class="thumbnail img-responsive" src="<?=base_url()?>assets/uploads/<?=$row->gambar2;?>">
                    <br>
                    <img width="300px" height="150px" class="thumbnail img-responsive" src="<?=base_url()?>assets/uploads/<?=$row->gambar3;?>">
                </div>
                <div class=" col-md-6 col-lg-6 ">
                    <h3 class="panel-title">
                        <center>
                            <h3 class="panel-title">
                                <p>DETAIL LAHAN</p>
                            </h3>
                        </center>
                    </h3>
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><strong>Kode Lahan</strong></td>
                            <td>
                                <?=$row->kode_alternatif?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama lahan</strong></td>
                            <td>
                                <?=$row->nama_alternatif?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>
                                <?=$row->keterangan?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Latitude</strong></td>
                            <td>
                                <?=$row->lat?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Longitude</strong></td>
                            <td>
                                <?=$row->lng?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <a data-toggle="modal" data-target="#edit-data">
                        <center>
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-success"><span>DATA</span><br><span>RINCIAN</span><br><span>LAHAN</span></button>
                        </center>
                    </a>
                </div>
            </div>
            <div class="row">
                <h3 class="panel-title">
                    <center>
                        <h1 class="panel-title">
                            <p>DETAIL LOKASI LAHAN</p>
                        </h1>
                    </center>
                </h3>
            </div>
            <div class="row">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/jquery/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#profil').attr("value",div.data('profil'));
        });
    });

    var defaultCenter = {
        lat : <?=set_value('lat', $row->lat)*1?>,
        lng : <?=set_value('lng', $row->lng)*1?>
    };
    function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: defaultCenter
        });
        var infoWindow = new google.maps.InfoWindow({
            content: '<h4>Drag untuk pindah lokasi</h4>'
        });

        var marker = new google.maps.Marker({
            position: defaultCenter,
            map: map,
            title: 'Click to zoom',
            draggable:true
        });

        /*// Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                defaultCenter = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                infoWindow.setPosition(defaultCenter);
                marker.setPosition(defaultCenter);
                map.setCenter(defaultCenter);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }*/

        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        infoWindow.open(map, marker);

        var infowindowContent = document.getElementById('infowindow-content');

        autocomplete.addListener('place_changed', function() {
            infoWindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            document.getElementById('nama').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infoWindow.setContent(place.name + '');
            infoWindow.open(map, marker);
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    function handleEvent(event) {
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    }

    $(function(){
        initMap();
    })
</script>
<div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">
                    <center>
                        Edit Profil Perusahaan
                    </center>
                </h3>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('Member/profil_usaha')?>" role="form" class="form-horizontal" method="post">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Profil</label>
                            <div class="col-md-9">
                                <input name="profil" class="form-control" type="text" id="profil">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" class="btn btn-info btn-block"><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal --