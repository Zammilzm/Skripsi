<div class="row">
    <div class="col-md-8">
        <?= print_error() ?>
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Tambah Mitra Tani</h4>
                <p class="category">Silahkan Tambahkan Data Mitra Tani yang Akan didaftarkan</p>
            </div>
            <div class="card-content">
                <form method="post" action="<?= site_url('data_pendaftar/tambah') ?>"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="username"
                               value="<?= set_value('usernmae') ?>">
                    </div>
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="password"
                               value="<?= set_value('password') ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="namalengkap"
                               value="<?= set_value('namalengkap') ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamatlengkap"
                               value="<?= set_value('alamatlengkap') ?>">
                    </div>
                    <div class="form-group">
                        <label>No Hp <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" name="nohp"
                               value="<?= set_value('nohp') ?>">
                    </div>
                    <div class="form-group">
                        <span class="fileinput-new">Foto KTP <span class="text-danger">*</span></span>
                        <input type="file" name="ktp"/></span>
                        <br/>
                    </div>
                    <div class="form-group">
                        <a>
                            <button class="btn btn-primary">
                                <i class="material-icons">edit</i> Simpan
                            </button>
                        </a>
                        <a class="btn btn-danger" href="<?= site_url('data_pendaftar') ?>">
                            <i class="material-icons">backspace</i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>