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
                                Berikut List Lahan yang diajukan Mitra
                            </p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="row">
                    <div class="card card-nav-tabs">
                        <div class="card-header panel-fill">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#proses" data-toggle="tab">
                                                <i class="fa fa-fw fa-info"></i>
                                                Lahan Dalam Proses
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#setuju" data-toggle="tab">
                                                <i class="fa fa-fw fa-star"></i>
                                                Lahan Disetujui
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#tolak" data-toggle="tab">
                                                <i class="fa fa-fw fa-trash"></i>
                                                Lahan Ditolak
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="proses">
                                    <?php foreach ($proses as $row): ?>
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 " align="center">
                                                        <?php if ($row->gambar1 === NULL): ?>
                                                            <h3>Belum ada gambar</h3>
                                                        <?php else: ?>
                                                            <img width="200px" height="100px"
                                                                 class="thumbnail img-responsive"
                                                                 src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>">
                                                            <h4>Foto Lahan</h4>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class=" col-md-5 col-lg-5 ">
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
                                                                <td><strong>Keterangan</strong></td>
                                                                <td>
                                                                    <?= $row->keterangan ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tipe Kerjasama</strong></td>
                                                                <td>
                                                                    <?= $row->Tipe_penawaran ?>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 ">
                                                        <center>
                                                            <h3>Status Pengajuan</h3>
                                                        </center>
                                                        <?php if ($row->Status === 'Diproses'): ?>
                                                            <center>
                                                                <button class="btn btn-warning">
                                                                    <span>PENGAJUAN DIPROSES</span>
                                                                </button>
                                                            </center>
                                                        <?php elseif ($row->Status === 'Disetujui'): ?>
                                                            <center>
                                                                <button class="btn btn-warning"
                                                                        style="opacity: 0.6; cursor: not-allowed;">
                                                                    <span>PENGAJUAN DIPROSES</span>
                                                                </button>
                                                                <br><br>
                                                                <button class="btn btn-success">
                                                                    <span>DISETUJUI</span>
                                                                </button>
                                                                <br><br>
                                                                <a target="_blank" class="btn btn-xs btn-warning"
                                                                   href="<?= $row->Doc_Kontrak_admin ?>">
                                                                    <i class="fa fa-fw fa-download"></i>
                                                                    Klik Untuk Download
                                                                </a>
                                                                <p>Silahkan Download berkas kontrak diatas dan isi
                                                                    sesuai data lahan yang ada
                                                                    kontrak.
                                                                    Silahkan datang ke kantor PG Asembagus untuk
                                                                    penandatanganan kontrak, penyerahan
                                                                    berkas lahan
                                                                    dan nota kesepakatan</p>
                                                            </center>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane" id="setuju">
                                    <?php foreach ($setuju as $row): ?>
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 " align="center">
                                                        <?php if ($row->gambar1 === NULL): ?>
                                                            <h3>Belum ada gambar</h3>
                                                        <?php else: ?>
                                                            <img width="200px" height="100px"
                                                                 class="thumbnail img-responsive"
                                                                 src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>">
                                                            <h4>Foto Lahan</h4>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class=" col-md-5 col-lg-5 ">
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
                                                                <td><strong>Keterangan</strong></td>
                                                                <td>
                                                                    <?= $row->keterangan ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tipe Kerjasama</strong></td>
                                                                <td>
                                                                    <?= $row->Tipe_penawaran ?>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 ">
                                                     <center>   <h3>Status Pengajuan</h3></center>
                                                        <?php if ($row->Status === 'Diproses'): ?>
                                                            <center>
                                                                <button class="btn btn-warning">
                                                                    <span>PENGAJUAN DIPROSES</span>
                                                                </button>
                                                            </center>
                                                        <?php elseif ($row->Status === 'Disetujui'): ?>
                                                            <center>
                                                                <button class="btn btn-success">
                                                                    <span>DISETUJUI</span>
                                                                </button>
                                                                <br><br>
                                                                <a target="_blank" class="btn btn-xs btn-warning"
                                                                   href="<?= $row->Doc_Kontrak_admin ?>">
                                                                    <i class="fa fa-fw fa-download"></i>
                                                                    Klik Untuk Download
                                                                </a>
                                                                <p>Silahkan Download berkas kontrak diatas dan isi
                                                                    sesuai data lahan yang ada
                                                                    kontrak.
                                                                    Silahkan datang ke kantor PG Asembagus untuk
                                                                    penandatanganan kontrak, penyerahan
                                                                    berkas lahan
                                                                    dan nota kesepakatan</p>
                                                            </center>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane" id="tolak">
                                    <?php foreach ($tolak as $row): ?>
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-lg-3 " align="center">
                                                        <?php if ($row->gambar1 === NULL): ?>
                                                            <h3>Belum ada gambar</h3>
                                                        <?php else: ?>
                                                            <img width="200px" height="100px"
                                                                 class="thumbnail img-responsive"
                                                                 src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>">
                                                            <h4>Foto Lahan</h4>
                                                        <?php endif; ?>

                                                    </div>
                                                    <div class=" col-md-5 col-lg-5 ">
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
                                                                <td><strong>Keterangan</strong></td>
                                                                <td>
                                                                    <?= $row->keterangan ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tipe Kerjasama</strong></td>
                                                                <td>
                                                                    <?= $row->Tipe_penawaran ?>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 ">
                                                        <center>   <h3>Status Pengajuan</h3></center>
                                                        <?php if ($row->Status === 'Diproses'): ?>
                                                            <center>
                                                                <button class="btn btn-warning">
                                                                    <span>PENGAJUAN DIPROSES</span>
                                                                </button>
                                                            </center>
                                                        <?php elseif ($row->Status === 'Disetujui'): ?>
                                                            <center>
                                                                <button class="btn btn-success">
                                                                    <span>DISETUJUI</span>
                                                                </button>
                                                                <br><br>
                                                                <a target="_blank" class="btn btn-xs btn-warning"
                                                                   href="<?= $row->Doc_Kontrak_admin ?>">
                                                                    <i class="fa fa-fw fa-download"></i>
                                                                    Klik Untuk Download
                                                                </a>
                                                                <p>Silahkan Download berkas kontrak diatas dan isi
                                                                    sesuai data lahan yang ada
                                                                    kontrak.
                                                                    Silahkan datang ke kantor PG Asembagus untuk
                                                                    penandatanganan kontrak, penyerahan
                                                                    berkas lahan
                                                                    dan nota kesepakatan</p>
                                                            </center>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'
        src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>