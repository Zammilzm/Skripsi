<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">List Lahan</h4>
                <p class="category">Berikut adalah Lahan Yang tersedia untuk diajukan Kerjasama Kepada Mitra</p>
            </div>
            <div class="card-content table-responsive">
                <form class="form-inline">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?= site_url('alternatif/tambah') ?>">
                            <i class="material-icons">queue</i> Tambah</a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-default" target="_blank"
                           href="<?= site_url('alternatif/cetak') ?>">
                            <i class="material-icons">print</i> Cetak
                        </a>
                    </div>
                </form>

                <table class="table table-hover" id="contoh">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Alternatif</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 0;
                    foreach ($rows as $row):?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->kode_alternatif ?></td>
                            <td><?= $row->nama_alternatif ?></td>
                            <td><?= $row->keterangan ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning">
                                    <i class="material-icons">done</i> Detail
                                </a>
                                <a class="btn btn-xs btn-warning"
                                   href="<?= site_url("alternatif/ubah/$row->kode_alternatif") ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="btn btn-xs btn-danger"
                                   href="<?= site_url("alternatif/hapus/$row->kode_alternatif") ?>"
                                   onclick="return confirm('Hapus data?')">
                                    <i class="material-icons">delete</i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>