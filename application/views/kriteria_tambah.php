<div class="row">
    <div class="col-md-8">
        <?= print_error() ?>
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Tambah Kriteria</h4>
                <p class="category">Silahkan Tambahkan Kriteria Sebagai Parameter Lahan</p>
            </div>
            <div class="card-content">
                <form method="post" action="<?= site_url('kriteria/tambah') ?>">
                    <div class="form-group label-floating">
                        <label class="control-label">Kode <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="kode"
                               value="<?= set_value('kode', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2)) ?>"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nama Kriteria <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">MinMax <span class="text-danger">*</span></label>
                        <select class="form-control" name="minmax">
                            <option></option>
                            <?= get_minmax_option(set_value('minmax')) ?>
                        </select>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Tipe Preferensi <span class="text-danger">*</span></label>
                        <select class="form-control" name="tipe">
                            <option></option>
                            <?= get_tipe_option(set_value('tipe')) ?>
                        </select>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Parameter Q <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="par_q" value="<?= set_value('par_q') ?>"/>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Parameter P <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="par_p" value="<?= set_value('par_p') ?>"/>
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