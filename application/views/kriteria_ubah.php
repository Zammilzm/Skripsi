<div class="row">
    <div class="col-md-6">
        <?php echo validation_errors(); ?>
        <?php echo form_open( "kriteria/ubah/$row->kode_kriteria" ); ?>
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" name="kode" value="<?=set_value('kode', $row->kode_kriteria)?>" readonly="" />
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" name="nama" value="<?=set_value('nama', $row->nama_kriteria)?>" />
            </div>
            <div class="form-group">
                <label>MinMax <span class="text-danger">*</span></label>
                <select class="form-control" name="minmax">
                    <option></option>
                    <?=get_minmax_option(set_value('minmax', $row->minmax))?>
                </select>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?=set_value('bobot', $row->bobot)?>"/>
            </div>
            <div class="form-group">
                <label>Tipe Preferensi <span class="text-danger">*</span></label>
                <select class="form-control" name="tipe">
                    <option></option>
                    <?=get_tipe_option(set_value('tipe', $row->tipe))?>
                </select>
            </div>
            <div class="form-group">
                <label>Parameter Q <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="par_q" value="<?=set_value('par_q', $row->par_q)?>"/>
            </div>
            <div class="form-group">
                <label>Parameter P <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="par_p" value="<?=set_value('par_p', $row->par_p)?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('kriteria')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>