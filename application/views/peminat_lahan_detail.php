<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 10/03/2018
 * Time: 8:45
 */
?>
<div class="row">
    <div class="col-md-8">
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
    <div class="col-md-4 col-lg-4 " align="center">
        <?php if ($row->gambar1 === NULL): ?>
            <h3>Belum ada gambar</h3>
        <?php else: ?>
            <img src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>"
                 class="img-circle" width="300px" height="300px">
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header" data-background-color="green">
            <center>
                <h3 class="title">Peminat Lahan</h3>
                <p class="category">Berikut adalah profil Para Peminat Lahan</p>
                <u><b><p class="category">Admin Hanya bisa memilih melakukan kerjasama dengan 1 Mitra</p></b></u>
            </center>
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <?php
        foreach ($users as $p) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card card-profile">
                    <div style="padding: 10px; margin-bottom: 15px;">
                        <a href="#"></a>
                        <?php if ($p->gambar === NULL): ?>
                            <div class="card-avatar">
                                <img class="img-circle img-responsive" width="200px" height="200px"
                                     class="img-thumbnail"
                                     src="<?php echo base_url('assetsadmin/img/logo_ptpn_x.png'); ?>"/>
                            </div>
                        <?php else: ?>
                            <div class="card-avatar">
                                <img class="img-circle img-responsive" width="200px" height="200px"
                                     class="img-thumbnail"
                                     src="<?php echo base_url() . 'assets/uploads/' . $p->gambar ?>"/>
                            </div>
                        <?php endif; ?>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="#"><?php echo $p->nama ?></a>
                            </h4>
                            <p class="card-text">Email : <?php echo $p->email ?></p>
                            <p class="card-text">Kode Booking Lahan : <?php echo $p->id_booking_lahan ?></p>
                            <p class="card-text">Tipe Penawaran Kerjasama : <br>
                                <u><strong><?php echo $p->Tipe_penawaran ?></strong></u></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-sm btn-warning">
                                <i class="material-icons">person</i>
                                Profil Lengkap
                            </a>
                            <?php if ($p->Status === 'Diproses'): ?>
                                <a class="btn btn-sm btn-danger" data-toggle="modal"
                                   data-target="#Kontrak<?php echo $p->id_user ?>">
                                    <i class="material-icons">book</i>
                                    Kirim Kontrak
                                </a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-success">
                                    <i class="material-icons">done</i>
                                    Kontrak sudah dikirim <span><br>Menunggu User upload Berkas</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" id="Kontrak<?php echo $p->id_user ?>">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                            </button>
                            <h3 class="modal-title">
                                <center>
                                    Data Kesepakatan Kontrak dengan <span><?= $p->nama ?></span>
                                </center>
                            </h3>
                            <center>
                                <strong>
                                    <p>
                                        Dengan Klik Kirim Kontrak, maka anda mempercayakan lahan ini untuk digarap oleh
                                        mitra
                                        Tani bersangkutan. Kontrak akan berlaku saat user upload kontrak persetujuan
                                    </p>
                                    <p>Silahkan Lampirkan File Kontrak Sesuai tipe Kerjasama yang ditawarkan User</p>
                                    <p>Tipe Penawaran : <span><?php echo $p->Tipe_penawaran ?></span></p>
                                    <p>Kode Booking : <span><?php echo $p->id_booking_lahan ?></span></p>
                                </strong>
                            </center>
                        </div>
                        <div class="modal-body" style="height: 150px; overflow-y: auto;">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <form action="<?= site_url("Kontrak/upload_kontrak/$p->id_booking_lahan") ?>"
                                          method="post" enctype="multipart/form-data">
                                        <div class="file-upload">
                                            <div class="file-select">
                                                <div class="file-select-button" id="fileName">Pilih File</div>
                                                <div class="file-select-name" id="noFile">No file chosen...</div>
                                                <input type="file" name="berkas_kontrak" id="chooseFile">
                                            </div>
                                        </div>
                                        <center><input type="submit" class="btn btn-success" value="Kirim Kontrak">
                                        </center>
                                    </form>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <?php } ?>
    </div>
</div>


<script>
    $('#chooseFile').bind('change', function () {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        }
        else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
</script>
