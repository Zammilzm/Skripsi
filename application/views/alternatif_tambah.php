<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post" action="<?=site_url('alternatif/tambah')?>">
            <div class="form-group">
                <label>Kode Alternatif<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" value="<?=set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'A', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?=set_value('nama_alternatif')?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="<?=set_value('keterangan')?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('alternatif')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>