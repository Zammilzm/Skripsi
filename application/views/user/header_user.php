<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PG Asembagus</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID&libraries=places"></script>
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/assets/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/assets/DataTables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>floyd/plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>floyd/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-floyd.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-helper.css">
    <script type='text/javascript' src="<?php echo base_url(); ?>floyd/plugins/jquery/jquery-3.1.1.min.js"></script>
    <script type='text/javascript'
            src="<?php echo base_url(); ?>assets/assets/DataTables/media/js/jquery.dataTables.js"></script>

</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="text-size-40 text-loose">Mitra Tani</span><br>
                <span class="text-size-18 text-grey">Perusahaan Gula</span><br>
                <span class="text-size-24 text-grey">PG ASEMBAGUS</span>
            </div>
            <div class="sidebar-avatar">
                <div class="sidebar-avatar-image"><img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>"
                                                       alt="" class="img-circle"></div>
                <div class="sidebar-avatar-text">Mitra</div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
                <li><a href="<?= site_url('Member/index') ?>"><i class="fa  fa-star"></i><span>Home</span></a></li>
                <li><a href="<?= site_url('Member/profil') ?>"><i
                                class="fa fa-user-md"></i><span>Profil</span></a></li>
                <li>
                    <a href="#nav-dropdown1" data-toggle="collapse" aria-controls="nav-dropdown1">
                        <i class="fa fa-fw fa-window-maximize"></i><span>Cari Lahan</span>
                        <span class="sidebar-nav-arrow"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="sidebar-nav-child collapse collapseable" id="nav-dropdown1">
                        <li><a href="<?= site_url('Alternatif/lahan_user') ?>"><i class="fa  fa-star"></i><span>Peringkat Lahan</span></a>
                        </li>
                        <li><a href="<?= site_url('Alternatif/tampil_peta') ?>"><i class="fa fa-star"></i><span>Lokasi Lahan</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="<?= site_url('Kontrak/list_status_booking') ?>"><i class="fa fa-book"></i><span>Lahan User</span></a>
                </li>
                <li><a href="<?= site_url('Panen') ?>"><i class="fa fa-pencil-square"></i><span>Data Panen</span></a>
                </li>
                <li><a href="<?= site_url('user/logout') ?>"><i class="fa fa-wrench"></i><span>Logout</span></a>
                </li>
            </ul>

        </div>
    </div>
    <div id="main-panel">