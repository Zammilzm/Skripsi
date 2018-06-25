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
                    <?php if ($row->gambar1 === NULL): ?>
                        <h3>Belum ada gambar</h3>
                    <?php else: ?>
                        <img width="300px" height="150px" class="thumbnail img-responsive"
                             src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>">
                    <?php endif; ?>
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
                                <?= $row->kode_alternatif ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama lahan</strong></td>
                            <td>
                                <?= $row->nama_alternatif ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pemilik</strong></td>
                            <td>
                                <?= $row->nama_pemilik ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Alamat Lengkap</strong></td>
                            <td>
                                <?= $row->alamat_lengkap ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>
                                <?= $row->keterangan ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Latitude</strong></td>
                            <td>
                                <?= $row->lat ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Longitude</strong></td>
                            <td>
                                <?= $row->lng ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <center>
                        <a data-toggle="modal" data-target="#edit-data">
                            <button class="btn btn-success">
                                <span>DATA</span><br><span>RINCIAN LAHAN</span>
                            </button>
                        </a>
                        <?php if (isset($booking)): ?>
                            <?php if ($booking->Status === 'Diproses'): ?>
                                <a>
                                    <button class="btn btn-warning">
                                        <span>LAHAN SUDAH</span><br><span>ANDA BOOKING</span><br><span></span>
                                    </button>
                                </a>
                            <?php elseif ($booking->Status === 'Disetujui'): ?>
                                <button class="btn btn-danger">
                                    <span>LAHAN DISETUJUI</span><br><span>CEK MENU LAHAN USER</span><br><span></span>
                                </button>
                            <?php elseif ($booking->Status === 'Ditolak'): ?>
                                <a data-toggle="modal" data-target="#booking-lahan">
                                    <button class="btn btn-success">
                                        <span>BOOKING</span><br><span>LAHAN</span>
                                    </button>
                                </a>
                            <?php elseif ($booking->Status === 'Kontrak Selesai'): ?>
                                <a data-toggle="modal" data-target="#booking-lahan">
                                    <button class="btn btn-success">
                                        <span>BOOKING</span><br><span>LAHAN</span>
                                    </button>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a data-toggle="modal" data-target="#booking-lahan">
                                <button class="btn btn-success">
                                    <span>BOOKING</span><br><span>LAHAN</span>
                                </button>
                            </a>
                        <?php endif; ?>
                        <br><br>
                    </center>
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

<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>

<script type="text/javascript">

    var defaultCenter = {
        lat: <?=set_value('lat', $row->lat) * 1?>,
        lng: <?=set_value('lng', $row->lng) * 1?>
    };

    function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: defaultCenter
        });
        var infoWindow = new google.maps.InfoWindow({
            content: '<h4>Lokasi Lahan</h4>'
        });

        var marker = new google.maps.Marker({
            position: defaultCenter,
            map: map,
            title: 'Click to zoom',
            draggable: false
        });

        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        infoWindow.open(map, marker);

        var infowindowContent = document.getElementById('infowindow-content');

        autocomplete.addListener('place_changed', function () {
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

    $(function () {
        initMap();
    })
</script>
<div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">
                    <center>
                        RINCIAN LAHAN
                    </center>
                </h3>
            </div>
            <div class="modal-body" style="height: 350px; overflow-y: auto;">
                <?php foreach ($nilainya as $row): ?>
                    <div class="form-group">
                        <label><?= $row->nama_kriteria ?> <span class="text-danger">*</span></label>
                        <p>
                            <?= $row->nilai ?> <span> <?= $row->Satuan ?></span>
                        </p>
                    </div>
                <?php endforeach ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="booking-lahan" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">
                    <center>
                        BOOKING LAHAN
                    </center>
                    <hr>
                </h3>
                <h4 align="center">
                    Sebagai Mitra Tani PG Asembagus, anda dapat memilih program tebu Rakyat Mandiri atau Tebu Rakyat
                    Kredit
                </h4>
            </div>
            <div class="modal-body">
                <h4>Tebu Rakyat Mandiri</h4>
                <p align="justify">
                    Program kemitraan ini memungkinkan anda bekerja sama dengan Pabrik Gula Asembagus <span><b>tanpa mendapatkan
                    sarana kredit</b></span>. Info selengkapnya mengenai program Tebu Rakyat Mandiri dapat dibaca pada
                    menu Info atau
                    <a href="#">Klik Disini</a>
                </p>
                <hr>
                <h4>Tebu Rakyat Kredit</h4>
                <p align="justify">
                    Program kemitraan ini memungkinkan anda bekerja sama dengan Pabrik Gula Asembagus dan <span><b>mendapatkan
                    sarana kredit </b></span>. Info selengkapnya mengenai program Tebu Rakyat Kredit dapat dibaca pada
                    menu Info atau
                    <a href="#">Klik Disini</a>
                </p>
                <br>
                <h3>--- Catatan ---</h3>
                <p align="justify">
                    Saat anda booking, permintaan akan dikirimkan kepada admin PG Asembagus. Keputusan apakah anda
                    yang berhak menerima kontrak akan diinfokan di menu kontrak lahan mengingat banyaknya peminat
                    lahan.
                </p>
                <center>
                    <form method="post" action="<?= site_url("Kontrak/set_booking_mandiri") ?>">
                        <input type="hidden" name="kode_alternatif" value="<?= $row->kode_alternatif ?>">
                        <button class="btn btn-success" type="submit">
                        <span>
                        Booking Sebagai <br>
                        <span>Tebu Rakyat <span><b>Mandiri</b></span></span>
                    </span>
                        </button>
                    </form>
                    <br>
                    <form method="post" action="<?= site_url("Kontrak/set_booking_kredit") ?>">
                        <input type="hidden" name="kode_alternatif" value="<?= $row->kode_alternatif ?>">
                        <button class="btn btn-success">
                        <span>
                        Booking Sebagai <br>
                        <span>Tebu Rakyat <span><b>Kredit</b></span></span>
                    </span>
                        </button>
                    </form>
                </center>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->