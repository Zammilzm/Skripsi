<?= print_error() ?>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Pilih Lokasi</h4>
                <p class="category">Silahkan Pilih Lokasi Lahan</p>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <input class="form-control" type="text" id="pac-input" placeholder="Cari lokasi"/>
                </div>
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Tambah Lahan</h4>
                <p class="category">Silahkan Tambahkan Lahan dan Lokasi Lahan Sesuai Kebutuhan anda</p>
            </div>
            <div class="card-content">
                <form method="post" action="<?= site_url('alternatif/tambah') ?>" enctype="multipart/form-data">
                    <div class="form-group label-floating">
                        <label class="control-label">Kode Alternatif<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kode_alternatif"
                               value="<?= set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'A', 2)) ?>"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nama Alternatif <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_alternatif"
                               value="<?= set_value('nama_alternatif') ?>" id="nama"/>
                    </div>
                    <div class="form-group label-floating">
                        <label>Latitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="lat" id="lat" value="<?= set_value('lat') ?>"
                               readonly=""/>
                    </div>
                    <div class="form-group label-floating">
                        <label>Longitude <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="lng" name="lng" value="<?= set_value('lng') ?>"
                               readonly=""/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Keterangan</label>
                        <input class="form-control" type="text" name="keterangan"
                               value="<?= set_value('keterangan') ?>"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Foto Lokasi ( Maksimal 3 foto )</label>
                        <input type="file" name="userfile[]" multiple="multiple">
                    </div>
                    <div class="form-group">
                        <a>
                            <button class="btn btn-primary">
                                <i class="material-icons">edit</i> Simpan
                            </button>
                        </a>
                        <a href="<?= site_url('alternatif') ?>">
                            <button class="btn btn-danger">
                                <i class="material-icons">backspace</i> Kembali
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var defaultCenter = {
        lat: -7.5235235864973005,
        lng: 111.39712464062495
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

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                defaultCenter = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                infoWindow.setPosition(defaultCenter);
                marker.setPosition(defaultCenter);
                map.setCenter(defaultCenter);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

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