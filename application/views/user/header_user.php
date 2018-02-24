<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Floyd</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet"/>
    <link href="<?=base_url('assets/css/theme-floyd.css')?>" rel="stylesheet"/>
    <link href="<?=base_url('assets/css/theme-helper.css')?>" rel="stylesheet"/>


</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <div id="sidebar-wrapper">
            <div class="sidebar-avatar">
                <div class="sidebar-avatar-image"><img src="assets/images/me.PNG" alt="" class="img-circle"></div>
                <div class="sidebar-avatar-text">Member</div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-close"><a href="#"><i class="fa fa-fw fa-close"></i></a></li>
                <li><a href="<?=site_url('Member/index')?>"><i class="fa fa-fw fa-star"></i><span>Home</span></a></li>
                <li><a href="<?=site_url('Member/profil')?>"><i class="fa fa-fw fa-font"></i><span>Profil</span></a></li>
                <li><a href="<?=site_url('user/logout')?>"><i class="fa fa-fw fa-wrench"></i><span>Logout</span></a></li>
            </ul>
        </div>
    </div>
