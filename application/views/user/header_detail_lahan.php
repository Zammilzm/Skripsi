<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Floyd</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID&libraries=places"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/plugins/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-floyd.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-helper.css">

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
                <div class="sidebar-avatar-image"><img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>" alt="" class="img-circle"></div>
                <div class="sidebar-avatar-text">Mitra</div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
                <li><a href="<?=site_url('Member/index')?>"><i class="fa fa-fw fa-star"></i><span>Home</span></a></li>
                <li><a href="<?=site_url('Member/profil')?>"><i class="fa fa-fw fa-user-md"></i><span>Profil</span></a></li>
                <li><a href="<?=site_url('Member/profil_usaha')?>"><i class="fa fa-fw fa-user-circle"></i><span>Profil Perusahaan</span></a></li>
                <li><a href="<?=site_url('Alternatif/lahan_user')?>"><i class="fa fa-fw fa-user-circle"></i><span>Peringkat Lahan</span></a></li>
                <li><a href="<?=site_url('user/logout')?>"><i class="fa fa-fw fa-wrench"></i><span>Logout</span></a></li>
            </ul>

        </div>
    </div>
    <div id="main-panel">
