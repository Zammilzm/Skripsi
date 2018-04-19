<div id="top-nav">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Navbar toggle button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                        aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Sidebar toggle button -->
                <button type="button" class="sidebar-toggle">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand text-size-24" href="#"><i class="fa fa-bookmark-o"></i> LAHAN USER
                </a>
            </div>
        </div>
    </nav>
</div>
<div id="content">
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="contoh">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Lahan</th>
                        <th>Nama Lahan</th>
                        <th>Status Kontrak</th>
                        <th>Tanggal Panen</th>
                        <th>Jumlah Panen</th>
                        <th>Status Verifikasi Panen</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 0;
                    foreach ($panen as $row):?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->kode_alternatif ?></td>
                            <td><?= $row->nama_alternatif ?></td>
                            <td><?= $row->Status_kontrak ?></td>
                            <td><?= $row->Tanggal_panen ?></td>
                            <td><?= $row->Jumlah_panen ?></td>
                            <td><?= $row->Status_verifikasi_panen ?></td>
                            <td>
                                <center>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#tambah-data<?= $row->id_kontrak ?>"><i
                                                class="fa fa-fw fa-info-circle"></i>
                                        <span>
                                            Data Panen
                                </span>
                                    </a>
                                    <br><br>
                                    <a class="btn btn-xs btn-warning"
                                       href="<?= site_url("alternatif/detail_lahan_user/$row->kode_alternatif") ?>"><i
                                                class="fa fa-fw fa-info-circle"></i>
                                        <span>
                                    Detail Lahan
                                </span>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>

<script>
    $(document).ready(function () {
        $('#contoh').DataTable();
    });

    $('.datepicker').datepicker();
</script>

<?php foreach ($panen as $row):?>
<div class="modal fade" id="tambah-data<?= $row->id_kontrak ?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">
                    <center>
                        Data Panen
                    </center>
                </h3>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open("Panen/update_panen/$row->id_kontrak"); ?>

                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Panen</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="date" class="form-control" name="tanggal" value="<?= $row->Tanggal_panen ?>" >
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <center>
                            <label class="control-label col-md-3">Jumlah Panen <span>Dalam satuan Ton</span></label>
                        </center>

                        <div class="col-md-9">
                            <input name="jumlahpanen" class="form-control" type="text" value="<?= $row->Jumlah_panen ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
                <input type="submit" value="submit" class="btn btn-info btn-block"><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach; ?>
<!-- End Bootstrap modal -->


