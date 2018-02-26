<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?=$this->input->get('search')?>" />
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="<?=site_url('alternatif/tambah')?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="<?=site_url('alternatif/cetak?search=' . $this->input->get('search'))?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php
            $no=0;
            foreach($rows as $row):?>
                <tr>
                    <td><?=++$no ?></td>
                    <td><?=$row->kode_alternatif?></td>
                    <td><a href="<?=site_url('alternatif/detail/'. $row->kode_alternatif)?>"><?=$row->nama_alternatif?></a></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="<?=site_url("alternatif/ubah/$row->kode_alternatif")?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="<?=site_url("alternatif/hapus/$row->kode_alternatif")?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>