<div class="row">
    <div class="col-md-6">
        <?=print_error()?>
        <?=form_open( "relasi/ubah/" . $rows[0]->kode_alternatif ); ?>
            <?php foreach($rows as $row): ?>                    
            <div class="form-group">
                <label><?=$row->nama_kriteria?> <span class="text-danger">*</span></label>
                <input class="form-control" name="kode_crips[<?=$row->ID?>]" value="<?=$row->nilai?>" />                
            </div>
            <?php endforeach?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="<?=site_url('relasi')?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
    <div>
    </div>
</div>