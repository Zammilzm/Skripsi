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
                        <a class="btn btn-primary" href="<?= site_url('data_pendaftar/tambah') ?>">
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
                                <?php echo "<a class='btn btn-xs btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' 
                                data-href='data_pendaftar/hapus/$row->user'>Hapus</a>"
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"> Hapus</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>