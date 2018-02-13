<div class="row">
    <div class="col-md-6">
        <?php echo validation_errors(); ?>
        <?php echo form_open( "alternatif/ubah/$row->kode_alternatif" ); ?>
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" name="kode_alternatif" value="<?=set_value('kode', $row->kode_alternatif)?>" readonly="" />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" name="nama_alternatif" value="<?=set_value('nama_alternatif', $row->nama_alternatif)?>" />
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="keterangan" value="<?=set_value('keterangan', $row->keterangan)?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('alternatif')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>