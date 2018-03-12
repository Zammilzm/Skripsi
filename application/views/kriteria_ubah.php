<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Update Kriteria</h4>
                <p class="category">Silahkan Update Kriteria sesuai kebutuhan anda</p>
            </div>
            <div class="card-content">
                <?php echo validation_errors(); ?>
                <?php echo form_open("kriteria/ubah/$row->kode_kriteria"); ?>
                <div class="form-group label-floating">
                    <label class="control-label">Kode</label>
                    <input disabled class="form-control" name="kode" value="<?= set_value('kode', $row->kode_kriteria) ?>"
                           / >
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Nama <span class="text-danger">*</span></label>
                    <input class="form-control" name="nama" value="<?= set_value('nama', $row->nama_kriteria) ?>"/>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">MinMax <span class="text-danger">*</span></label>
                    <select class="form-control" name="minmax">
                        <option></option>
                        <?= get_minmax_option(set_value('minmax', $row->minmax)) ?>
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Bobot <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="bobot"
                           value="<?= set_value('bobot', $row->bobot) ?>"/>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Tipe Preferensi <span class="text-danger">*</span></label>
                    <select class="form-control" name="tipe">
                        <option></option>
                        <?= get_tipe_option(set_value('tipe', $row->tipe)) ?>
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Parameter Q <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="par_q"
                           value="<?= set_value('par_q', $row->par_q) ?>"/>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Parameter P <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="par_p"
                           value="<?= set_value('par_p', $row->par_p) ?>"/>
                </div>
                <div class="form-group">
                    <a>
                        <button class="btn btn-primary">
                            <i class="material-icons">edit</i> Simpan
                        </button>
                    </a>
                    <a href="<?= site_url('kriteria') ?>">
                        <button class="btn btn-danger">
                            <i class="material-icons">backspace</i> Kembali
                        </button>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>