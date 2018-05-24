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
                        <input readonly class="form-control" type="text" name="kode"
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
                        <select class="form-control" name="tipe" id="select">
                            <option></option>
                            <?= get_tipe_option(set_value('tipe')) ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Parameter Q <span class="text-danger">*</span></label>
                        <input min="0" class="form-control" type="number" name="par_q" id="par_q"/>
                    </div>
                    <div class="form-group ">
                        <label class="control-label">Parameter P <span class="text-danger">*</span></label>
                        <input min="0" class="form-control" type="number" name="par_p" id="par_p"/>
                    </div>
                    <div class="form-group">
                        <a>
                            <button class="btn btn-primary">
                                <i class="material-icons">edit</i> Simpan
                            </button>
                        </a>
                        <a class="btn btn-danger" href="<?= site_url('kriteria') ?>">
                            <i class="material-icons">backspace</i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#select').on('change', function (data) {
        pilihan = $('#select').val();

        if (pilihan == 1) {
            $('#par_p').val(0);
            $('#par_p').prop('readonly',true);
            $('#par_q').val(0);
            $('#par_q').prop('readonly',true);
        }
        else if (pilihan == 2){
            $('#par_p').val(0);
            $('#par_p').prop('readonly',true);
            $('#par_q').val("");
        }
        else if (pilihan == 3){
            $('#par_q').val(0);
            $('#par_q').prop('readonly',true);
            $('#par_p').val("");
        }
        else if (pilihan == 4){
            $('#par_p').val("");
            $('#par_q').val("");
        }
        else {
            $('#par_p').val("");
            $('#par_q').val("");
        }
    });

</script>