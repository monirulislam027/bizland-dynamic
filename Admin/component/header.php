<?php


use App\Admin\Messages;
use App\Config\Config;
use App\Config\Auth;
use App\Config\Information;

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

$config = new Config();

$auth = new Auth();

$information = new Information();


$auth->is_logged_in() ? false : header('location:login.php');

$id = base64_decode($_SESSION['auth_user_id']);

$auth_user = $auth->auth_user($id);
$message_obj = new Messages();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $config->titleGenerate().' | '. $information->site_title()['value']?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= $config->baseUrl ?>node_modules/admin-lte/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/dist/admin.css">
    <link rel="stylesheet" href="<?= $config->baseUrl ?>assets/admin/resources/css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $config->baseUrl ?>" target="_blank" class="nav-link">Bizland</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $config->adminBaseUrl ?>customize/sections_headings.php" class="nav-link">Section's</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $config->adminBaseUrl ?>customize/customize.php" class="nav-link">Customize</a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="<?= $auth->adminBaseUrl ?>message.php">
                    <i class="far fa-envelope"></i>
                    <span class="badge badge-primary navbar-badge"><?= $message_obj->messages()->num_rows ?></span>
                </a>
            </li>

            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= $config->baseUrl ?>assets/admin/resources/image/user2-160x160.jpg"
                         class="user-image img-circle elevation-2" alt="User Image">

                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="<?= $config->baseUrl ?>assets/admin/resources/image/user2-160x160.jpg"
                             class="img-circle elevation-2" alt="User Image">

                        <p>
                            <?= $auth_user['name'] ?>- Web Developer
                            <small>Member since <?= date('M d , Y', strtotime($auth_user['created_at'])) ?> </small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>

                        <a href="logout.php" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Sign out
                        </a>

                        <form id="logout-form" action="logout.php" method="POST" style="display: none;">
                            <input type="hidden" name="action" value="logout">
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= $config->baseUrl ?>assets/admin/index3.html" class="brand-link">
            <img src="<?= $config->baseUrl ?>assets/admin/resources/image/AdminLTELogo.png"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="<?= $auth->adminBaseUrl ?>dashboard.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $auth->adminBaseUrl ?>hero.php" class="nav-link">
                            <i class=" nav-icon fas fa-home"></i>
                            <p>
                                Hero
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $auth->adminBaseUrl ?>about_us.php" class="nav-link">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-award"></i>
                            <p>
                                Ability
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>ability/skills.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Skill</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>ability/counter.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Counter</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Client
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>client/client_logo.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Logos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>client/testimonials.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Testimonials</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $auth->adminBaseUrl ?>services/services.php" class="nav-link">
                            <i class="nav-icon fas fa-equals"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>
                                Works
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>work/works_menu.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>work/works_items.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Items</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $auth->adminBaseUrl ?>team/team_member.php" class="nav-link">
                            <i class="nav-icon fab fa-teamspeak"></i>
                            <p>
                                Team
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $auth->adminBaseUrl ?>faqs/faqs.php" class="nav-link">
                            <i class="nav-icon far fa-question-circle"></i>
                            <p>
                                FAQ's
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Contact Us
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>contact/contact_info.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Info</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= $auth->adminBaseUrl ?>contact/contact_options.php" class="nav-link">
                                    <i class="far fa-arrow-alt-circle-right nav-icon"></i>
                                    <p>Options</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-4">
        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">

                <!--            content start-->


