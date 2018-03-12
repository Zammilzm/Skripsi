<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 11/03/2018
 * Time: 22:16
 */
?>
<br><br>
<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <center>
                            <span class="text-size-22"><i class="fa fa-clone space-right-10"></i>List Lahan</span>
                            <p class="break-top-10 text-size-16">
                                Berikut List Lahan yang diajukan Mitra untuk bekerjasama dengan Perusahaan
                            </p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($lahans as $lahan): ?>
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <?php if ($lahan->gambar1 === NULL): ?>
                                <h3>Belum ada gambar</h3>
                            <?php else: ?>
                                <img width="200px" height="100px" class="thumbnail img-responsive"
                                     src="<?= base_url() ?>assets/uploads/<?= $lahan->gambar1; ?>">
                                <h4>Foto Lahan</h4>
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
                                        <?= $lahan->kode_alternatif ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Nama lahan</strong></td>
                                    <td>
                                        <?= $lahan->nama_alternatif ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Keterangan</strong></td>
                                    <td>
                                        <?= $lahan->keterangan ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Tipe Kerjasama</strong></td>
                                    <td>
                                        <?= $lahan->Tipe_penawaran ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3 col-lg-3 ">
                            <h3>Status Pengajuan</h3>
                            <?php if ($lahan->Status === 'Diproses'): ?>
                                <center>
                                    <button class="btn btn-warning">
                                        <span>PENGAJUAN DIPROSES</span>
                                    </button>
                                </center>
                            <?php elseif ($lahan->Status === 'Disetujui'): ?>
                                <center>
                                    <button class="btn btn-warning" style="opacity: 0.6; cursor: not-allowed;">
                                        <span>PENGAJUAN DIPROSES</span>
                                    </button>
                                    <br><br>
                                    <button class="btn btn-success">
                                        <span>DISETUJUI</span>
                                    </button>
                                </center>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>