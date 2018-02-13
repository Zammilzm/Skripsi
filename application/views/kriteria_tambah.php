<div class="row">
    <div class="col-sm-6">
        <?=print_error()?>
        <form method="post" action="<?=site_url('kriteria/tambah')?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=set_value('kode', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=set_value('nama')?>"/>
            </div>
            <div class="form-group">
                <label>MinMax <span class="text-danger">*</span></label>
                <select class="form-control" name="minmax">
                    <option></option>
                    <?=get_minmax_option(set_value('minmax'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?=set_value('bobot')?>"/>
            </div>
            <div class="form-group">
                <label>Tipe Preferensi <span class="text-danger">*</span></label>
                <select class="form-control" name="tipe">
                    <option></option>
                    <?=get_tipe_option(set_value('tipe'))?>
                </select>
            </div>
            <div class="form-group">
                <label>Parameter Q <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="par_q" value="<?=set_value('par_q')?>"/>
            </div>
            <div class="form-group">
                <label>Parameter P <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="par_p" value="<?=set_value('par_p')?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('kriteria')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>