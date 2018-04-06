<div class="row">
    <h3 class="title text-center">Kontrak Pabrik dengan Mitra</h3>
    <div class="nav-center">
        <ul class="nav nav-pills nav-pills-danger nav-pills-icons justify-content-center" role="tablist">
            <!--
color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
-->
            <li class="active">
                <a href="#description-1" role="tab" data-toggle="tab">
                    <i class="material-icons">book</i> Pengajuan Kontrak
                </a>
            </li>
            <li>
                <a href="#schedule-1" role="tab" data-toggle="tab">
                    <i class="material-icons">library_books</i> Kontrak Mitra
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="description-1">
            <?php foreach ($setuju as $row): ?>
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h3 class="title"><?= $row->nama_alternatif ?></h3>
                </div>
                <div class="card-content">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><strong>Kode Lahan</strong></td>
                            <td>
                                <?= $row->kode_alternatif ?>
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
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="tab-pane" id="schedule-1">
            <div class="card">
                <div class="card-content">
                    Efficiently unleash cross-media information without cross-media value. Quickly maximize timely
                    deliverables for real-time schemas.
                    <br/>
                    <br/> Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tasks-1">
            <div class="card">
                <div class="card-content">
                    Completely synergize resource taxing relationships via premier niche markets. Professionally
                    cultivate one-to-one customer service with robust ideas.
                    <br/>
                    <br/>Dynamically innovate resource-leveling customer service for state of the art customer
                    service.
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tasks-2">
            <div class="card">
                <div class="card-content">
                    From the seamless transition of glass and metal to the streamlined profile, every detail was
                    carefully considered to enhance your experience. So while its display is larger, the phone feels
                    just right.
                    <br/>
                    <br/> Another Text. The first thing you notice when you hold the phone is how great it feels in
                    your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure
                    in a remarkable, simplified design.
                </div>
            </div>
        </div>
    </div>
</div>
