<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <title>PG ASEMBAGUS</title>
    <script src="<?= base_url('assetsadmin/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('assetsadmin/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID&libraries=places"></script>
    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url('assetsadmin/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assetsadmin/css/file_upload.css') ?>" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="<?= base_url('assetsadmin/css/material-dashboard.css?v=1.2.0') ?>" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
          type='text/css'>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="../assetsadmin/img/sidebar-1.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <center>
                    <div class="sidebar-avatar-image"><img
                                src="<?php echo base_url('assetsadmin/img/logo_ptpn_x.png'); ?>" width="100px"
                                height="100px" class="img-circle"></div>
                </center>
                <a href="#" class="simple-text">
                    PG ASEMBAGUS
                </a>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="<?= site_url('kriteria') ?>">
                        <i class="material-icons">payment</i>
                        <p>Kriteria Lahan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('alternatif') ?>">
                        <i class="material-icons">list</i>
                        <p>List Lahan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('relasi') ?>">
                        <i class="material-icons">compare</i>
                        <p>Nilai Lahan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('kontrak') ?>">
                        <i class="material-icons">book</i>
                        <p>Peminat Lahan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('kontrak/List_kontrak_admin') ?>">
                        <i class="material-icons">done</i>
                        <p>Kontrak Lahan Mitra</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('hitung') ?>">
                        <i class="material-icons">shuffle</i>
                        <p>Perangkingan</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('user/password') ?>">
                        <i class="material-icons">build</i>
                        <p>Ubah Password</p>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('user/logout') ?>">
                        <i class="material-icons text-gray">notifications</i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        Pabrik Gula (PG) Asembagus
                    </a>
                </div>
        </nav>
        <div class="content">
            <div class="container-fluid">