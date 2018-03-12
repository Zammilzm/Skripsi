<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Edit Nilai Rincian Lahan</h4>
                <p class="category">Silahkan Edit Nilai Lahan Sesuai Kebutuhan anda</p>
            </div>
            <div class="card-content">
                <?= print_error() ?>
                <?= form_open("relasi/ubah/" . $rows[0]->kode_alternatif); ?>
                <?php foreach ($rows as $row): ?>
                    <div class="form-group">
                        <label><?= $row->nama_kriteria ?> <span class="text-danger">*</span></label>
                        <input class="form-control" name="kode_crips[<?= $row->ID ?>]" value="<?= $row->nilai ?>"/>
                    </div>
                <?php endforeach ?>
                <div class="form-group">
                    <a>
                        <button class="btn btn-primary">
                            <i class="material-icons">edit</i> Simpan
                        </button>
                    </a>
                    <a href="<?= site_url('relasi') ?>">
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
