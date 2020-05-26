<?php
session_start();

include "../config/config.php";

$login_email_err = $login_password_err = "";

if(isset($_POST['login_submit'])){

    $login_user_email = mysqli_real_escape_string($link, $_POST['input_email']);
    $login_password = mysqli_real_escape_string($link, $_POST['input_password']);

    if (empty($login_user_email)) {
        $login_user_email_err = "Sorry, email is required";
    }
    if (empty($login_password)) {
        $login_password_err = "Sorry, password is required";
    }

    if (empty($login_email_err) && empty($login_password_err)) {
        $login_password = md5($login_password);
        $query = "SELECT * FROM users WHERE email='$login_user_email' AND password='$login_password'";
        $results = mysqli_query($link, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['logout'] = true;
            header('location: ../profile/profile.php');
        }else {
            $login_user_err = "Sorry, the email or password is incorrect";
        }
    }
}
