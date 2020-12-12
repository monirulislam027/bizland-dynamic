<?php


namespace App\Config;


class Auth extends Config
{

    public function register($name, $email, $password)
    {
        return $this->connect->query("INSERT INTO `users` (`name` ,`email` , `password`) VALUES ( '$name' , '$email' , '$password' )");

    }

    public function user_find_with_email($email)
    {
        return $this->connect->query("Select * From `users` where `email` = '$email'");
    }

    public function user_find_with_id($id)
    {
        return $this->connect->query("Select * From `users` where `email` = '$id'");
    }

    public function auth_error_message($message)
    {
        $message_t = '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        $message_t .= $message;
        $message_t .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $message_t .= ' <span aria-hidden="true">&times;</span>';
        $message_t .= '</button>';
        $message_t .= ' </div>';

        return $message_t;

    }

    public function auth_success_message($message)
    {

        $message_t = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        $message_t .= $message;
        $message_t .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $message_t .= ' <span aria-hidden="true">&times;</span>';
        $message_t .= '</button>';
        $message_t .= ' </div>';

        return $message_t;

    }

    public function is_logged_in()
    {
        session_start();
        return isset($_SESSION['auth_user_email']);

    }
//    token update with email
    public function token_update_with_email($token, $email)
    {
        return $this->connect->query("Update `users` Set `token` = '$token' Where `email` = '$email' ");
    }
//    password update with email
    public function password_update($password, $email)
    {
        return $this->connect->query("Update `users` Set `password` = '$password' , `token` = '' Where `email` = '$email' ");
    }

}
