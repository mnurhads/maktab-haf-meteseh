<?php
require_once '../app/control.php';
$log = new Model();

if(isset($_POST['login'])) {
  $login['username'] = $_POST['username'];
  $login['password'] = $_POST['password'];

  $log->loginWeb($login);
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Info Maktab HAF 2023</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $log->baseUrl(); ?>/assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= $log->baseUrl(); ?>/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Content Icon New -->
    <script src="https://kit.fontawesome.com/de5e2ca05e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <form action="" method="POST">
                <div class="nk-form">
                    <img src="<?= $log->baseUrl(); ?>/assets/img/khidmah.png" alt="Logo Perusahaan" width="120px"><br><br>
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-envelope"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="fa fa-lock"></i></span>
                        <div class="nk-int-st">
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="fm-checkbox">
                        <!-- <a href="" class="btn btn-primary">Reset Password</a> -->
                    </div>
                    <button name="login" type="submit" class="btn btn-login btn-danger btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/waypoints.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/counterup/counterup-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/wave/waves.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/icheck/icheck.min.js"></script>
    <script src="<?= $log->baseUrl(); ?>/assets/js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= $log->baseUrl(); ?>/assets/js/main.js"></script>
</body>
</html>