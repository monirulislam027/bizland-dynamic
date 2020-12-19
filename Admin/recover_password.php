<?php

use App\Config\Auth;
use App\Config\Config;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

$config = new Config();

$auth = new Auth();

$auth->is_logged_in() ? header('location:dashboard.php') : false;

if (isset($_GET['email'])  && $_GET['email'] != '' && isset($_GET['token']) && $_GET['token'] != ''){

    $email = $_GET['email'];
    $token = $_GET['token'];

    $user = $auth->user_find_with_email($email);
    $user = $user->fetch_assoc();

    if ($user['token'] != $token){
        header('location:login.php');
    }


}else{
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $config->titleGenerate() ?> | BizLand </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="<?= $config->baseUrl ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/dist/admin.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
            <div class="row">
                <div class="col-md-12">

                    <div id="response-message" class="pb-2"></div>

                </div>
            </div>
            <form id="recover-password" method="post">
                <input type="hidden" name="email" value="<?= $_GET['email']?>">
                <div class="input-group mb-3">
                    <input type="password" class="form-control" minlength="6" maxlength="32" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" minlength="6" maxlength="32" name="con_password" id="con_password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" id="recover-password-btn">Change password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="login.html">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<script src="<?= $config->baseUrl ?>assets/dist/admin.js"></script>

</body>
</html>
