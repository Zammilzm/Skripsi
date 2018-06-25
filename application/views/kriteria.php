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
                        <a class="btn btn-primary" target="_blank" href="<?= site_url('kriteria/cetak?search=' . $this->input->get('search')) ?>">
                            <i class="material-icons">print</i> Cetak
                        </a>
                    </div>
                </form>
                <table class="table table-hover"  id="contoh">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Satuan</th>
                        <th>Min or Max</th>
                        <th>Tipe Preferensi</th>
                        <th>Q</th>
                        <th>P</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($rows as $row):?>
                        <tr>
                            <td><?= $row->kode_kriteria ?></td>
                            <td><?= ucfirst($row->nama_kriteria) ?></td>
                            <td><?= $row->Satuan ?></td>
                            <td><?= ucfirst($row->minmax) ?></td>
                            <td><?= $row->tipe ?></td>
                            <td><?= $row->par_q ?></td>
                            <td><?= $row->par_p ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning"
                                   href="<?= site_url("kriteria/ubah/$row->kode_kriteria") ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <?php echo "<a class='btn btn-xs btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' 
                                data-href='kriteria/hapus/$row->kode_kriteria'>Hapus</a>"
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
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
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>