<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 09/03/2018
 * Time: 18:25
 */
?>
<div class="row">
    <div class="col-lg-4 col-md-8 col-sm-8">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">store</i>
            </div>
            <div class="card-content">
                <p class="category">Jumlah Peminat Lahan</p>
                <h3 class="title"><?php echo $peminat->jumlah ?>
                    <span>Orang</span>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> Hingga Saat Ini
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-8 col-sm-8">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">info_outline</i>
            </div>
            <div class="card-content">
                <p class="category">Jumlah Lahan Tersedia</p>
                <h3 class="title"><?php echo $total->total_lahan ?>
                    <span>Lahan</span>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    Hingga Saat Ini
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-8 col-sm-8">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">person</i>
            </div>
            <div class="card-content">
                <p class="category">Jumlah User Aktif</p>
                <h3 class="title"><?php echo $user->jumlah ?>
                    <span>Pengguna</span>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> Hingga Saat Ini
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">List Lahan Yang Sedang Diminati</h4>
                <p class="category">
                    Berikut Lahan yang diminati oleh Mitra Tani beserta Jumlah Peminatnya
                    <span><b><u>Klik Detail Untuk Melihat Peminat Lahan dan silahkan pilih Mitra yang diajak bekerjasama</u></b></span>
                </p>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Kode Lahan</th>
                        <th>Nama Lahan</th>
                        <th>Alamat</th>
                        <th>Jumlah Peminat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    foreach ($lahan as $row):?>
                        <tr>
                            <td><?= $row->kode_alternatif ?></td>
                            <td><?= $row->nama_alternatif ?></td>
                            <td><?= $row->keterangan ?></td>
                            <td><?= $row->jumlah_peminat ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning"
                                   href="<?= site_url("kriteria/ubah/$row->kode_alternatif") ?>">
                                    <i class="material-icons">book</i> Kerjasama
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
