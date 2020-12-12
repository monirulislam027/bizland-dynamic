<?php

if (isset($_POST['action']) && $_POST['action'] == 'logout'){

    session_start();
    session_destroy();
    session_unset($_SESSION['auth_user_email']);
    session_unset($_SESSION['auth_user_name']);
    session_unset($_SESSION['auth_user_id']);

    header('location:login.php');

}else{
    sleep(1);
    header("location:javascript://history.go(-1)");
}


