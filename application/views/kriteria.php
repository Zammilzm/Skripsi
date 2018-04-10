<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">List Kriteria</h4>
                <p class="category">Berikut adalah Parameter yang Digunakan Untuk Mengukur Kelayakan Lahan</p>
            </div>
            <div class="card-content table-responsive">
                <form class="form-inline">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?= site_url('kriteria/tambah') ?>" >
                            <i class="material-icons">queue</i> Tambah
                        </a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-default" target="_blank" href="<?= site_url('kriteria/cetak?search=' . $this->input->get('search')) ?>">
                            <i class="material-icons">print</i> Cetak
                        </a>
                    </div>
                </form>
                <table class="table table-hover"  id="contoh">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Mimmax</th>
                        <th>Bobot</th>
                        <th>Tipe Preferensi</th>
                        <th>Q</th>
                        <th>P</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 0;
                    foreach ($rows as $row):?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->kode_kriteria ?></td>
                            <td><?= $row->nama_kriteria ?></td>
                            <td><?= $row->minmax ?></td>
                            <td><?= $row->bobot ?></td>
                            <td><?= $row->tipe ?></td>
                            <td><?= $row->par_q ?></td>
                            <td><?= $row->par_p ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning"
                                   href="<?= site_url("kriteria/ubah/$row->kode_kriteria") ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <a class="btn btn-xs btn-danger"
                                   href="<?= site_url("kriteria/hapus/$row->kode_kriteria") ?>"
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
