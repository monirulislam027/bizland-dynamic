<?php

use App\Config\Auth;
use App\Config\Config;

require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'vendor/autoload.php';

$config = new Config();

$auth = new Auth();

$auth->is_logged_in() ? header('location:dashboard.php'):false;

?>

<!DOCTYPE html>
<html lang="English">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $config->titleGenerate() ?> | BizLand </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/dist/admin.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>BizLand</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="row">
                <div class="col-md-12">

                    <div id="response-message" class="pb-2"></div>

                </div>
            </div>
            <form method="post" id="login-form">
                <div class="input-group mb-3">
                    <input type="email" value="<?= isset($_COOKIE['auth_user_email']) ? $_COOKIE['auth_user_email']:'' ?>" class="form-control" name="email" id="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" value="<?= isset($_COOKIE['auth_user_password']) ? $_COOKIE['auth_user_password']:'' ?>" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="login-form-btn">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <p class="mb-1">
                <a href="forgot-password.php">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register_account.php" class="text-center">Register a new account</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


<!-- custom javascript -->
<script src="<?= $config->baseUrl ?>assets/dist/admin.js"></script>
</body>
</html>
