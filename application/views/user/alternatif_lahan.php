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
                <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Daftar Lahan Yang Tersedia
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
                        <th>Peringkat Lahan</th>
                        <th>Kode Lahan</th>
                        <th>Nama Alternatif</th>
                        <th>Keterangan</th>
                        <th>Detail</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 0;
                    foreach ($lahan as $row):?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $row->kode_alternatif ?></td>
                            <td><?= $row->nama_alternatif ?></a></td>
                            <td><?= $row->keterangan ?></td>
                            <td>
                                <a class="btn btn-xs btn-warning"
                                   href="<?= site_url("alternatif/detail_lahan_user/$row->kode_alternatif") ?>"><i
                                            class="fa fa-fw fa-info-circle"></i>
                                    <span>
                                    Detail Lahan
                                </span>
                                </a>
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
</script>

