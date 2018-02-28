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
                    <?php foreach($pict as $row): ?>
                    <img src="<?=base_url()?>assets/uploads/<?=$row->gambar;?>" class="img-circle img-responsive" width="200px" height="200px">
                    <?php endforeach?>
                    <form action="<?=site_url('Member/ganti_foto')?>" method="post" enctype="multipart/form-data">
                        <table class="table table-striped">
                            <tr>
                                <td style="width:15%;">File Foto</td>
                                <td>
                                    <div class="col-sm-6">
                                        <input type="file" name="filefoto" class="form-control">
                                    </div>
                                </td>
                            </tr>
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
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Kelamin</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat Lengkap</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Foto KTP</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>Foto KK</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <a
                            href="javascript:;"
                            data-user="<?php echo $user->user ?>"
                            data-pass="<?php echo $user->pass ?>"
                            data-nama="<?php echo $user->nama ?>"
                            data-email="<?php echo $user->email ?>"
                            data-toggle="modal" data-target="#edit-data">
                        <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-success">Update Data Diri</button>
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
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#user').attr("value",div.data('user'));
            modal.find('#pass').attr("value",div.data('pass'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#email').attr("value",div.data('email'));
        });
    });
</script>

<div class="modal fade" id="edit-data" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">
                    <center>
                        Edit Data Diri
                    </center>
                </h3>
            </div>
            <div class="modal-body">
                <form action="<?=site_url('Member/profil')?>" role="form" class="form-horizontal" method="post">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="user" class="form-control" type="text" id="user">
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
                    </div>
                    <input type="submit" value="submit" class="btn btn-info btn-block"><br>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
