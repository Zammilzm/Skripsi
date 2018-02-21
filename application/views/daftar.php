<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Admin</title>
</head>
<style>
    body {
        background-color: #525252;
    }

    .centered-form {
        margin-top: 60px;
    }

    .centered-form .panel {
        background: rgba(255, 255, 255, 0.8);
        box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
    }
</style>
<body>

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar
                        <small>It's free!</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?=site_url('User/daftar')?>">
                        <div class="form-group">
                            <input type="text" name="full_name" id="full_name" class="form-control input-sm"
                                   placeholder="Nama Lengkap" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm"
                                   placeholder="Email"/>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control input-sm"
                                           placeholder="Username" />
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm"
                                           placeholder="Password" />
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="submit" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</html>
