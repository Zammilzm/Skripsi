<div class="row">
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
                <h4 class="title">List Mitra Tani</h4>
                <p class="category">Berikut adalah daftar mitra tani yang terdaftar di dalam sistem</p>
            </div>
            <div class="card-content table-responsive">
                <form class="form-inline">
                    <div class="form-group">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="material-icons">queue</i> Tambah Pendaftar</a>
                    </div>
                </form>
                <table class="table table-hover" id="contoh">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Alamat Lengkap</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 0;
                    foreach ($rows as $row):?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= ucfirst($row->user) ?></td>
                            <td><?= ucfirst($row->pass) ?></td>
                            <td><?= ucfirst($row->nama) ?></td>
                            <td><?= ucfirst($row->email) ?></td>
                            <td><?= ucfirst($row->No_hp) ?></td>
                            <td><?= ucfirst($row->Alamat_lengkap) ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning">
                                    <i class="material-icons">done</i> Detail
                                </a>
                                <a class="btn btn-xs btn-warning">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <?php echo "<a class='btn btn-xs btn-danger'>Hapus</a>"
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="modal fade" role="dialog" id="tambahdata">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title">

                                </h3>
                            </div>
                            <div class="modal-body" style="height: 450px; overflow-y: auto;">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-header" data-background-color="purple">
                                            <h4 class="title">Daftarkan Mitra Tani</h4>
                                            <p class="category">Silahkan Perbarui Lahan dan Lokasi Lahan Sesuai
                                                Kebutuhan anda</p>
                                        </div>
                                        <div class="card-content">
                                            <form method="post" action="<?= site_url('data_pendaftar/tambah') ?>"
                                                  enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Username<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="username"
                                                                   required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="password"
                                                                   required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Lengkap <span
                                                                        class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="namalengkap"
                                                                   required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat Lengkap <span
                                                                        class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="alamatlengkap"
                                                                   required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>email <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="email" name="email"
                                                                   required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>No Hp <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="number" name="nohp"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div>
                                                            <span class="fileinput-new">Foto Profil</span>
                                                            <input type="file"/></span>
                                                            <br/>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>