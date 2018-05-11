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
                                <a class="btn btn-xs btn-warning"
                                   data-toggle="modal" data-target="#detail<?= $row->kode_alternatif ?>">
                                    <i class="material-icons">done</i> Detail
                                </a>
                                <a class="btn btn-xs btn-warning"
                                   href="<?= site_url("alternatif/ubah/$row->kode_alternatif") ?>">
                                    <i class="material-icons">edit</i> Edit
                                </a>
                                <?php echo "<a class='btn btn-xs btn-danger' data-toggle='modal' data-target='#konfirmasi_hapus' 
                                data-href='alternatif/hapus/$row->kode_alternatif'>Hapus</a>"
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
            <?php
            foreach ($rows as $row): ?>
            <div class="modal fade" role="dialog" id="detail<?= $row->kode_alternatif ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="height: 550px; overflow-y: auto; ">
                            <div class="row">
                                    <div class="card card-profile">
                                        <div class="card-avatar">
                                            <a href="#pablo">
                                                <img src="<?= base_url() ?>assets/uploads/<?= $row->gambar1; ?>"
                                                     class="img-circle" width="270px" height="270px">
                                            </a>
                                        </div>

                                        <div class="card-body">
                                            <h4 class="card-title">Rincian Lahan</h4>
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
                                                    <td><strong>Nama Pemilik</strong></td>
                                                    <td>
                                                        <?= $row->nama_pemilik ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Alamat Lengkap</strong></td>
                                                    <td>
                                                        <?= $row->alamat_lengkap ?>
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
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>