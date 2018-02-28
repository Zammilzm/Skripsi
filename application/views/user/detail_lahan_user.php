<?php
/**
 * Created by PhpStorm.
 * User: Zammil
 * Date: 28/02/2018
 * Time: 11:27
 */

?>

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
                <p>DETAIL LAHAN</p>
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>" alt="" class="img-circle img-responsive">
                </div>
                <div class=" col-md-7 col-lg-7 ">
                    <?php foreach($rows as $row): ?>
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td><strong>Kode Lahan</strong></td>
                            <td>
                                <?=$row->kode_alternatif?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama lahan</strong></td>
                            <td>
                                <?=$row->nama_alternatif?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>
                                <?=$row->keterangan?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php endforeach;?>
                    <?php foreach($nilainya as $row): ?>
                        <div class="form-group">
                            <label><?=$row->nama_kriteria?> <span class="text-danger">*</span></label>
                            <input class="form-control" name="kode_crips[<?=$row->ID?>]" value="<?=$row->nilai?>" />
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>


