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
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $relasi = array();
                    foreach ($rows as $row) {
                        $alternatif[$row->kode_alternatif] = $row->nama_alternatif;
                        $relasi[$row->kode_alternatif][$row->nama_kriteria] = $row->nilai;
                        $relasix[$row->kode_alternatif][$row->nama_kriteria] = $row->Satuan;
                    }
                    ?>
                    <table class="table table-bordered table-hover table-striped" id="contoh">
                        <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <?php
                            $first = array_values($relasix);
                            foreach ($first[0] as $key => $val):?>
                                <th><?= $key ?><span><br>(<?= $val ?>)</span></th>
                            <?php endforeach ?>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php foreach ($alternatif as $key => $value): ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                                <?php foreach ($relasi[$key] as $val): ?>
                                    <td><?= $val ?></td>
                                <?php endforeach ?>
                                <td>
                                    <a class="btn btn-xs btn-warning"
                                       href="<?= site_url("alternatif/detail_lahan_user/$key") ?>"><i
                                                class="fa fa-fw fa-info-circle"></i>
                                        <span>Detail Lahan</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type='text/javascript'
            src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>

    <script>
            $('#contoh').DataTable({
                "ordering": false
            });
    </script>

