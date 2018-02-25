<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floyd</title>
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>floyd/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-floyd.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>floyd/css/theme-helper.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>floyd/plugins/fontawesome/css/font-awesome.min.css">
</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <div class="sidebar-title">
                <span class="text-size-40 text-loose">Mitra Tani</span><br>
                <span class="text-size-18 text-grey">Perusahaan Gula</span>
                <span class="text-size-24 text-grey">PG ASEMBAGUS</span>
            </div>
            <div class="sidebar-avatar">
                <div class="sidebar-avatar-image"><img src="<?php echo base_url('floyd/images/blank-avatar.PNG'); ?>" alt="" class="img-circle"></div>
                <div class="sidebar-avatar-text">Mitra</div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
                <li><a href="<?=site_url('Member/index')?>"><i class="fa fa-fw fa-star"></i><span>Home</span></a></li>
                <li><a href="<?=site_url('Member/profil')?>"><i class="fa fa-fw fa-font"></i><span>Profil</span></a></li>
                <li><a href="<?=site_url('user/logout')?>"><i class="fa fa-fw fa-wrench"></i><span>Logout</span></a></li>
            </ul>

        </div>
    </div>
    <div id="main-panel">