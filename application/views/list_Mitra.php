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
                <p class="text-center">
                    Silahkan klik salah satu pilihan dibawah ini setelah anda memeriksa berkas
                    <strong><?= $row->nama_alternatif ?></strong> dengan kode lahan
                    <strong><?= $row->kode_alternatif ?></strong>
                    <br>
                    <a class="btn btn-default"><i
                                class="fa fa-close"></i>
                        Batalkan Perjanjian</a>
                    <a class="btn btn-default" data-toggle="modal" data-target="#setuju<?= $row->kode_alternatif ?>"><i
                                class="fa fa-book"></i>
                        Setujui Perjanjian Alih lahan</a>
                </p>
                <div class="modal fade" role="dialog" id="setuju<?= $row->kode_alternatif ?>">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">
                                    <strong><?= $row->kode_alternatif ?></strong>
                                </h3>
                            </div>
                            <div class="modal-body" style="height: 450px; overflow-y: auto;">
                                <center>
                                    <strong>
                                        <p>
                                            Dengan Klik Alih lahan, maka anda mempercayakan lahan ini untuk digarap oleh
                                            mitra Tani bersangkutan. Semua berkas termasuk data panen akan dikirimkan
                                            mitra saat

                                        </p>
                                        <br>

                                    </strong>
                                    <p>Lahan dalam kerjasama ialah lahan <br><strong><u><?= $row->nama_alternatif ?></u></strong></p>
                                    <br>
                                    <p>Dengan Mitra Kerjasama ialah <br> <strong><u><?= $row->nama ?></u></strong></p>
                                    <form method="post" action="<?= site_url("Mitra/setuju_alih_lahan") ?>">
                                        <input type="hidden" name="kode_alternatif"
                                               value="<?= $row->kode_alternatif ?>">
                                        <button class="btn btn-success">
                                            <span>
                                                SETUJUI ALIH LAHAN
                                            </span>
                                        </button>
                                    </form>
                                </center>
                            </div>
                        </div>
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
    </div>
</div>
