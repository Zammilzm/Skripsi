<div class="row">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Edit Lahan</h4>
            <p class="category">Silahkan Perbarui Lahan dan Lokasi Lahan Sesuai Kebutuhan anda</p>
        </div>
        <div class="card-content">
            <?php echo form_open_multipart("alternatif/ubah/$row->kode_alternatif"); ?>
            <?php echo validation_errors(); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kode</label>
                        <input class="form-control" name="kode_alternatif"
                               value="<?= set_value('kode', $row->kode_alternatif) ?>" readonly=""/>
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input class="form-control" name="nama_alternatif"
                               value="<?= set_value('nama_alternatif', $row->nama_alternatif) ?>" id="nama"/>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik <span class="text-danger">*</span></label>
                        <input class="form-control" name="nama_pemilik"
                               value="<?= set_value('nama_pemilik', $row->nama_pemilik) ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap <span class="text-danger">*</span></label>
                        <input class="form-control" name="alamat_lengkap"
                               value="<?= set_value('alamat_lengkap', $row->alamat_lengkap) ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Latitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="lat" id="lat"
                               value="<?= set_value('lat', $row->lat) ?>" readonly=""/>
                    </div>
                    <div class="form-group">
                        <label>Longitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="lng" name="lng"
                               value="<?= set_value('lng', $row->lng) ?>" readonly=""/>
                    </div>
                    <div class="form-group">
                        <label>Keterangan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="keterangan"
                               value="<?= set_value('keterangan', $row->keterangan) ?>"/>
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>" width="50" height="50">
                        <label>Foto Lokasi ( Maksimal 3 foto )</label>
                        <input type="file" name="file">
                    </div>
                    <div class="form-group">
                        <a>
                            <button class="btn btn-primary">
                                <i class="material-icons">edit</i> Simpan
                            </button>
                        </a>
                        <a class="btn btn-danger" href="<?= site_url('alternatif') ?>">
                            <i class="material-icons">backspace</i> Kembali
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" type="text" id="pac-input" placeholder="Cari lokasi"/>
                    </div>
                    <div id="map" style="height: 400px;"></div>
                </div>
                <div class="form-group">
                    <input type="hidden"  id="old"  name="old"  value="<?php echo $row->gambar1   ?>">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    var defaultCenter = {
        lat: <?=set_value('lat', $row->lat) * 1?>,
        lng: <?=set_value('lng', $row->lng) * 1?>
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
            draggable: true
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