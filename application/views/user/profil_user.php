<div id="top-nav">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Navbar toggle button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu"
                        aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Sidebar toggle button -->
                <button type="button" class="sidebar-toggle">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand text-size-24" href="#"><i class="fa fa-star-o"></i> Profil</a>
            </div>
        </div>
    </nav>
</div>
<div id="content">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo $this->session->userdata('user'); ?>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5 col-lg-5 " align="center">
                    <?php if ($user->gambar === NULL): ?>
                        <h3>Belum ada gambar</h3>
                    <?php else: ?>
                        <img src="<?= base_url() ?>assets/uploads/<?= $user->gambar; ?>"
                             class="img-circle img-responsive" width="200px" height="300px">
                    <?php endif; ?>
                    <form action="<?= site_url('Member/ganti_foto') ?>" method="post" enctype="multipart/form-data">
                        <table class="table table-striped">
                            <tr>
                                <td style="width:15%;">File Foto</td>
                                <td>
                                    <div class="col-sm-12">
                                        <input type="file" name="filefoto" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <input type="hidden"  id="old"  name="old"  value="<?php echo $user->gambar   ?>">
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class=" col-md-6 col-lg-6 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><strong>ID User</strong></td>
                            <td>
                                <?php echo $user->id_user ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Username</strong></td>
                            <td>
                                <?php echo $user->user ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Passowrd</strong></td>
                            <td>
                                <?php echo $user->pass ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama Lengkap</strong></td>
                            <td>
                                <?php echo $user->nama ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>
                                <?php echo $user->email ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>
                                <?php echo $user->level ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>No Hp</strong></td>
                            <td>
                                <?php echo $user->No_hp ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Alamat Lengkap</strong></td>
                            <td>
                                <?php echo $user->Alamat_lengkap ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Foto KTP</strong></td>
                            <td>
                                <?php if (!isset($user->Foto_ktp)): ?>
                                    <h5>Belum ada gambar</h5>
                                <?php else: ?>
                                    <img src="<?= base_url() ?>assets/uploads/<?= $user->Foto_ktp; ?>" width="100" height="100">
                                <?php endif; ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a
                            href="javascript:;"
                            data-user="<?php echo $user->user ?>"
                            data-pass="<?php echo $user->pass ?>"
                            data-nama="<?php echo $user->nama ?>"
                            data-email="<?php echo $user->email ?>"
                            data-hp="<?php echo $user->No_hp ?>"
                            data-alamat="<?php echo $user->Alamat_lengkap ?>"
                            data-foto="<?php echo $user->Foto_ktp ?>"
                            data-toggle="modal" data-target="#edit-data">
                        <button class="btn btn-success">Update Data Diri</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/jquery/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>floyd/js/theme-floyd.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#user').attr("value", div.data('user'));
            modal.find('#pass').attr("value", div.data('pass'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#email').attr("value", div.data('email'));
            modal.find('#hp').attr("value", div.data('hp'));
            modal.find('#alamat').attr("value", div.data('alamat'));
            modal.find('#foto').attr("value", div.data('foto'));
        });
    });
</script>

<div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">
                    <center>
                        Edit Data Diri
                    </center>
                </h3>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Member/profil') ?>" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="user" class="form-control" type="text" id="user" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input name="pass" class="form-control" type="text" id="pass">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input name="nama" class="form-control" type="text" id="nama">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" type="email" id="email">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No Hp</label>
                            <div class="col-md-9">
                                <input name="No_hp" class="form-control" type="number" id="hp">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-9">
                                <input name="Alamat_lengkap" class="form-control" type="text" id="alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Foto KTP</label>
                            <div class="col-md-9">
                                <?php if (!isset($user->Foto_ktp)): ?>
                                    <h5>Belum ada gambar</h5>
                                <?php else: ?>
                                    <img src="<?= base_url() ?>assets/uploads/<?= $user->Foto_ktp; ?>" width="100" height="100">
                                <?php endif; ?>
                                <table class="table table-striped">
                                    <tr>
                                        <td style="width:15%;">File Foto</td>
                                        <td>
                                            <div class="col-sm-12">
                                                <input type="file" name="filefoto" class="form-control" id="foto">
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden"  id="old"  name="old"  value="<?php echo $user->Foto_ktp   ?>">
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" class="btn btn-info btn-block"><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
