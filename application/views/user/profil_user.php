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
                <div class="col-md-3 col-lg-3 " align="center">
                    <img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>" alt="" class="img-circle img-responsive">
                </div>
                <div class=" col-md-7 col-lg-7 ">
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
                    <button class="btn btn-success btn-lg" type="button" onclick="edit_data(<?=set_value('id_user', $user->id_user)?>)"">
                        Update Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
