<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/'  . 'vendor/autoload.php';

header('content-type:application/json');

// mailer classes start
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Site\Site;

// mailer classes end

use App\Config\Auth;

$auth = new Auth();

$mail = new PHPMailer(true);

$site = new Site();

$data = ['error' => false, 'rdr' => false];
// register a account
if (isset($_POST['action']) && $_POST['action'] == 'register') {

//     check if there any not come to server
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

//        check for password confirmation
        if ($_POST['password'] == $_POST['confirm_password']) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
//            hashing the password. when some one know the password he cannot work read it.
            $password = password_hash($password, PASSWORD_DEFAULT);

//            create account
            $register = $auth->register($name, $email, $password);
            if ($register) {

//                send response for using redirect function in front or auth js file.
                $data['rdr'] = true;
//                redirect url
                $data['rdr_url'] = 'login.php';
//                sending the response message
                $data['message'] = $auth->auth_success_message("Account Created successfully! Redirecting........");

            } else {
//                if account not create send error message
                $data['error'] = true;
//                error message
                $data['message'] = $auth->auth_error_message('Account Creation failed!');
            }

        } else {
//            send this error if password doesn't matched
            $data['error'] = true;
//            send password doesn't match error message
            $data['message'] = $auth->auth_error_message("Password did't matched!");
        }


    } else {

        $data['error'] = true;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

//        if name is blank
        if ($name == '') {
//            if name is blank
            $data['message'] = $auth->auth_error_message($auth->error_message('name'));

        } elseif ($email == '') {
//            email is blank
            $data['message'] = $auth->auth_error_message($auth->error_message('email'));
        } elseif ($password == '') {
//            password is black
            $data['message'] = $auth->auth_error_message($auth->error_message('password'));
        } elseif ($confirm_password == '') {
//            confirm password is blank
            $data['message'] = $auth->auth_error_message($auth->error_message('confirm_password'));
        } else {
            $data['message'] = 'Something Went Wrong!';
        }
    }

    echo json_encode($data);


}

if (isset($_POST['action']) && $_POST['action'] == 'login') {

//    check if email and password come
    if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] != '' && $_POST['password'] != '') {

        $email = $_POST['email'];
        $password = $_POST['password'];

//        user find with email
        $user = $auth->user_find_with_email($email);
        $user_row = $user->fetch_assoc();

//        check if there any user exist in database
        if ($user->num_rows > 0 && password_verify($password, $user_row['password'])) {

            if (isset($_POST['remember'])) {
                setcookie('auth_user_email', $email, time() + (7 * 24 * 60 * 60));
                setcookie('auth_user_password', base64_encode($password), time() + (7 * 24 * 60 * 60));
            } else {
                setcookie('user_email', '', -time() + (7 * 24 * 60 * 60));
                setcookie('user_password', '', -time() + (7 * 24 * 60 * 60));
            }

//              send response for using redirect function in front or auth js file.
            $data['rdr'] = true;
//                redirect url
            $data['rdr_url'] = 'dashboard.php';


            $_SESSION['auth_user_email'] = $user_row['email'];
            $_SESSION['auth_user_name'] = $user_row['name'];
            $_SESSION['auth_user_id'] = base64_encode($user_row['id']);

        } else {
            $data['error'] = true;
            $data['message'] = $auth->auth_error_message('Username or password is incorrect!');
        }

    } else {

        $data['error'] = true;

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('email'));
        } elseif ($password == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('password'));
        } else {
            $data['message'] = 'Something Went Wrong!';
        }
    }

    echo json_encode($data);


}

if (isset($_POST['action']) && $_POST['action'] == 'forgot-password') {

    if (isset($_POST['email']) && $_POST['email'] != '') {

        $email = $_POST['email'];

        $user = $auth->user_find_with_email($email);
        if ($user->num_rows > 0) {

            $user = $user->fetch_assoc();
            $token = uniqid();
            if ($auth->token_update_with_email($token, $email)) {

                try {
                    //Server settings
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = '05dd8a15f515fa';                     // SMTP username
                    $mail->Password = '8c3244248b843b';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port = 2525;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('mdmonir027@gmail.com', 'Md Monir');
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Reset Your Password';
                    $mail->Body = '`<div style="margin: auto;width: 50%; text-align:center;">
                                    <p>Reset your password</p>
                                    <a href="' . $auth->baseUrl . 'admin/recover_password.php?email=' . $email . '&token=' . $token . '" style="background:#00c4cc;color: #fff; text-decoration:none;padding: 10px">Click Here</a>
                                </div>`';

                    $mail->send();
                    $data['message'] = $auth->auth_success_message("We have sent you a mail. Please check you mail inbox. By clicking that link, you can change you password! ");
                } catch (Exception $e) {
                    $data['error'] = true;
                    $data['message'] = $auth->auth_error_message("Something went wrong! Try again!" . $mail->ErrorInfo);
                }

            }

        } else {
            $data['error'] = true;
            $data['message'] = $auth->auth_error_message("Your provided email doesn't exist in our system");
        }

    } else {

        $data['error'] = true;

        $email = $_POST['email'];

        if ($email == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('email'));
        } else {
            $data['message'] = $auth->auth_error_message('Something Went Wrong!');
        }
    }

    echo json_encode($data);

}


if (isset($_POST['action']) && $_POST['action'] == 'recover-password') {

    if (isset($_POST['password']) && $_POST['password'] != '' && isset($_POST['con_password']) && $_POST['con_password'] != '') {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];
//        check if password didn;t matched
        if ($password === $con_password) {

            $user = $auth->user_find_with_email($email);
//            give one  more security so that site don't crush in hacker attack
            if ($user->num_rows > 0) {

                $user = $user->fetch_assoc();

//                hashing the password
                $password = password_hash($password , PASSWORD_DEFAULT);
                $password_update = $auth->password_update($password, $email);
                if ($password) {
                    $data['rdr'] = true;
                    $data['rdr_url'] = 'login.php';
                    $data['message'] = $auth->auth_success_message('password updated successfully!');
                }else{
                    $data['error'] = true;
                    $data['message'] = $auth->auth_error_message("Something went wrong!");
                }

            } else {
                $data['error'] = true;
                $data['message'] = $auth->auth_error_message("User Doesn't exist in out system!");
            }
        } else {
            $data['error'] = true;
            $data['message'] = $auth->auth_error_message("Password did not match!");
        }


    } else {

        $data['error'] = true;

        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];

        if ($password == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('password'));
        } else if ($con_password == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('confirm password'));
        } else if ($email == '') {
            $data['message'] = $auth->auth_error_message($auth->error_message('email'));
        } else {
            $data['message'] = $auth->auth_error_message('Something Went Wrong!');
        }
    }

    echo json_encode($data);

}


if (isset($_POST['action']) && $_POST['action'] == 'home-contact-messages') {
    if (isset($_POST['name']) && $_POST['name'] && isset($_POST['subject']) && $_POST['subject'] &&
        isset($_POST['email']) && $_POST['email'] && isset($_POST['message']) && $_POST['message']){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $message = $site->contact_message($name , $email , $subject , $message);

        if ($message){

            $data['message'] = "Thank you for sending us message! We wil contact you soon!";

        }else{
            $data['error'] = true;
            $data['message'] = 'Failed Try! Again!';
        }


    }else{
        $data['error']= true ;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if ($name != ''){
            $data['message'] = 'Name field is required';
        }else if($email != ''){
            $data['message'] = 'Email field is required';
        }else if($subject != ''){
            $data['message'] = 'Subject field is required';
        }else if($message != ''){
            $data['message'] = 'Message field is required';
        }else{
            $data['message'] = 'Failed! Try again!';
        }
    }

    echo  json_encode($data);
}
