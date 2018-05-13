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
                    <a class="btn btn-default" data-toggle="modal" data-target="#batal<?= $row->kode_alternatif ?>"><i
                                class="fa fa-close"></i>
                        Batalkan Alih lahan</a>
                    <a class="btn btn-default" data-toggle="modal" data-target="#setuju<?= $row->id_booking_lahan ?>"><i
                                class="fa fa-book"></i>
                        Setujui Perjanjian Alih lahan</a>
                </p>
                <div class="modal fade" role="dialog" id="setuju<?= $row->id_booking_lahan ?>">
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
                                    <p>Lahan dalam kerjasama ialah lahan <br><strong><u><?= $row->nama_alternatif ?></u></strong>
                                    </p>
                                    <br>
                                    <p>Dengan Mitra Kerjasama ialah <br> <strong><u><?= $row->nama ?></u></strong></p>
                                    <form method="post" action="<?= site_url("Mitra/setuju_alih_lahan") ?>">
                                        <input type="hidden" name="id_booking_lahan"
                                               value="<?= $row->id_booking_lahan ?>">
                                        <input type="hidden" name="kode_alternatif"
                                               value="<?= $row->kode_alternatif ?>">
                                        <input type="hidden" name="id_user"
                                               value="<?= $row->id_user ?>">
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
                <div class="modal fade" role="dialog" id="batal<?= $row->kode_alternatif ?>">
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
                                            Dengan Klik Batalkan, maka anda membatalkan kesepakatan dengan Mitra. Mitra
                                            lain dapat
                                            memproses lahan ini kembali
                                        </p>
                                        <br>

                                    </strong>
                                    <p>Lahan dalam kerjasama ialah lahan <br><strong><u><?= $row->nama_alternatif ?></u></strong>
                                    </p>
                                    <br>
                                    <p>Dengan Mitra Kerjasama ialah <br> <strong><u><?= $row->nama ?></u></strong></p>
                                    <form method="post" action="<?= site_url("Mitra/batalkan_alih_lahan") ?>">
                                        <input type="hidden" name="kode_alternatif"
                                               value="<?= $row->kode_alternatif ?>">
                                        <input type="hidden" name="id_user"
                                               value="<?= $row->id_user ?>">
                                        <button class="btn btn-success">
                                            <span>
                                                Batalkan Alih Lahan
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
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Daftar List Kerjasama</h4>
                    <p class="category">Berikut adalah Lahan dalam masa kontrak antara Mitra Tani dan PG Asembagus
                        . lahan ini sudah disetujui kedua belah pihak dan tertuang dalam kontrak kerjasama</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover" id="contoh">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lahan</th>
                            <th>Nama Mitra</th>
                            <th>Tanggal Panen</th>
                            <th>Jumlah Panen</th>
                            <th>Status Verifikasi Panen</th>
                            <th>Pesan</th>
                            <th>Status Kontrak</th>
                            <th>Detail</th>
                            <th>Verifikasi Panen</th>
                        </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($kepemilikan as $row): ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $row->nama_alternatif ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->Tanggal_panen ?></td>
                                <td><?= $row->Jumlah_panen ?></td>
                                <td><?= $row->Status_verifikasi_panen ?></td>
                                <td><?= $row->Pesan ?></td>
                                <td><?= $row->Status_kontrak ?></td>
                                <?php if (isset($row->Status_verifikasi_panen)): ?>
                                    <?php if ($row->Status_verifikasi_panen === 'Menunggu'): ?>
                                        <td>
                                            <a class="btn btn-xs btn-danger"
                                               data-toggle="modal" data-target="#verifikasi<?= $row->id_kontrak ?>">
                                                <i class="material-icons">done</i> Verifikasi Panen
                                            </a>
                                        </td>
                                    <?php elseif ($row->Status_verifikasi_panen === 'Tinjau ulang'): ?>
                                        <td>
                                            <a class="btn btn-xs btn-danger"
                                               data-toggle="modal" data-target="#verifikasi<?= $row->id_kontrak ?>">
                                                <i class="material-icons">done</i> Verifikasi Panen
                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <a class="btn btn-xs btn-success">
                                                <i class="material-icons">done</i> Terverifikasi
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <td>
                                        <a class="btn btn-xs btn-danger"
                                           data-toggle="modal" data-target="#verifikasi<?= $row->id_kontrak ?>">
                                            <i class="material-icons">done</i> Verifikasi Panen
                                        </a>
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-xs btn-warning"
                                       data-toggle="modal" data-target="#detail<?= $row->kode_alternatif ?>">
                                        <i class="material-icons">edit</i> Detail Mitra & Lahan
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php
            foreach ($kepemilikan as $row): ?>
                <div class="modal fade" role="dialog" id="detail<?= $row->kode_alternatif ?>">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">
                                    <strong><?= $row->kode_alternatif ?></strong>
                                </h3>
                            </div>
                            <div class="modal-body" style="height: 550px; overflow-y: auto;">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="card">
                                            <div class="card-header" data-background-color="red">
                                                <h3 class="title">DETAIL LAHAN</h3>
                                                <p class="category">Berikut Detail Lahan Yang Diminati user</p>
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
                                                        <td><strong>Nama lahan</strong></td>
                                                        <td>
                                                            <?= $row->nama_alternatif ?>
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
                                    </div>
                                    <div class="col-md-5 " align="center">
                                        <?php if ($row->gambar1 === NULL): ?>
                                            <h3>Belum ada gambar</h3>
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>"
                                                 class="img-circle" width="270px" height="270px">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 " align="center">
                                        <?php if ($row->gambar === NULL): ?>
                                            <h3>Belum ada gambar</h3>
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>assets/uploads/<?= $row->gambar; ?>"
                                                 class="img-circle" width="270px" height="270px">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card">
                                            <div class="card-header" data-background-color="green">
                                                <h3 class="title">DETAIL MITRA</h3>
                                                <p class="category">Berikut Detail Mitra yang bekerjasama</p>
                                            </div>
                                            <div class="card-content">
                                                <table class="table table-user-information">
                                                    <tbody>
                                                    <tr>
                                                        <td><strong>Username</strong></td>
                                                        <td>
                                                            <?= $row->user ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Nama Mitra</strong></td>
                                                        <td>
                                                            <?= $row->nama ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>email</strong></td>
                                                        <td>
                                                            <?= $row->email ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" id="verifikasi<?= $row->id_kontrak ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">
                                    <center>
                                        <strong>Verifikasi Data Panen</strong>
                                    </center>
                                </h3>
                            </div>
                            <div class="modal-body" style="height: 470px; overflow-y: auto;">
                                <center>
                                    <div class="card">
                                        <div class="card-header" data-background-color="red">
                                            <h3 class="title">HASIL PANEN LAHAN</h3>
                                            <p class="category">Silahkan cek data panen berikut ini. Klik verifikasi
                                                jika data sesuai dengan data di lapangan</p>
                                        </div>
                                        <div class="card-content">
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td><strong>Nama Lahan</strong></td>
                                                    <td>
                                                        <?= $row->nama_alternatif ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nama Mitra</strong></td>
                                                    <td>
                                                        <?= $row->nama ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tanggal Panen</strong></td>
                                                    <td>
                                                        <?= $row->Tanggal_panen ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Jumlah Panen</strong></td>
                                                    <td>
                                                        <?= $row->Jumlah_panen ?> <span> Ton</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td><strong>Status Verifikasi</strong></td>
                                                    <td>
                                                        <?= $row->Status_verifikasi_panen ?>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <table>
                                            <thead>
                                            <form method="post" action="<?= site_url("Mitra/verifikasi_panen") ?>">
                                                <input type="hidden" name="id_kontrak"
                                                       value="<?= $row->id_kontrak ?>">
                                                <input type="hidden" name="id_booking_lahan"
                                                       value="<?= $row->id_booking_lahan ?>">
                                                <input type="hidden" name="id_user"
                                                       value="<?= $row->id_user ?>">
                                                <div class="form-group label-floating">
                                                    <label>Pesan <span class="text-danger">*</span><br>(isi jika
                                                        diperlukan)</label>
                                                    <input class="form-control" type="text"  value="<?= $row->Pesan ?>" name="pesan"/>
                                                </div>
                                                <input type="submit" class="btn btn-success" value="Verifikasi Final"
                                                       name="verifikasi">
                                                <input type="submit" class="btn btn-primary" value="Verifikasi & Tambah Okupasi"
                                                       name="okupasi">
                                                <input type="submit" class="btn btn-danger" value="tinjau"
                                                       name="tinjau">
                                            </form>
                                            </thead>
                                        </table>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>

