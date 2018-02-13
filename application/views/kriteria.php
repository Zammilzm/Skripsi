<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="search" value="<?=$this->input->get('search')?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="<?=site_url('kriteria/tambah')?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="<?=site_url('kriteria/cetak?search=' . $this->input->get('search'))?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
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
        $no=0;
        foreach($rows as $row):?>
        <tr>
            <td><?=++$no ?></td>
            <td><?=$row->kode_kriteria?></td>
            <td><?=$row->nama_kriteria?></td>
            <td><?=$row->minmax?></td>
            <td><?=$row->bobot?></td>
            <td><?=$row->tipe?></td>
            <td><?=$row->par_q?></td>
            <td><?=$row->par_p?></td>
            <td>
                <a class="btn btn-xs btn-warning" href="<?=site_url("kriteria/ubah/$row->kode_kriteria")?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-danger" href="<?=site_url("kriteria/hapus/$row->kode_kriteria")?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>