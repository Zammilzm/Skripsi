<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="<?= base_url('assetsadmin/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <!--===============================================================================================-->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!--===============================================================================================-->
    <link href="<?= base_url('vendor/animate/animate.css') ?>" rel="stylesheet"/>
    <!--===============================================================================================-->
    <link href="<?= base_url('vendor/css-hamburgers/hamburgers.min.css') ?>" rel="stylesheet"/>
    <!--===============================================================================================-->
    <link href="<?= base_url('vendor/select2/select2.min.css') ?>" rel="stylesheet"/>
    <!--===============================================================================================-->
    <link href="<?= base_url('assets/css/util.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet"/>
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <?=print_error()?>
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo base_url('assets/img/img-01.png'); ?>">
            </div>

            <form class="login100-form validate-form" method="post" action="ceklogin">
					<span class="login100-form-title">
						Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="user" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
                    <a href="#" data-toggle="tooltip" title="Silahkan Hubungi di nomor 085990342190 (CS) jika anda lupa username atau password">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!--===============================================================================================-->
<script type='text/javascript' src="<?php echo base_url(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type='text/javascript' src="<?php echo base_url(); ?>vendor/bootstrap/js/popper.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type='text/javascript' src="<?php echo base_url(); ?>vendor/select2/select2.min.jss"></script>
<!--===============================================================================================-->
<script type='text/javascript' src="<?php echo base_url(); ?>vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    });
</script>
<!--===============================================================================================-->
<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>