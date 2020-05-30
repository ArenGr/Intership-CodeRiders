<?php
session_start();

include "../config/config.php";

$login_email_err = $login_password_err = "";

if(isset($_POST['login_submit'])){

    if (empty($_POST['input_password'])) {
        $login_password_err = "Sorry, password is required";
    }else{
        $login_password = $_POST['input_password'];
    }

    if (empty($_POST['input_email'])) {
        $login_email_err = "Sorry, email is required";
    }else{
        $login_user_email = mysqli_real_escape_string($link, $_POST['input_email']);
    }

    if (empty($login_email_err) && empty($login_password_err)) {
        $login_password = md5($login_password);
        $query = "SELECT * FROM users WHERE password='$login_password' AND email='$login_user_email'";
        $results = mysqli_query($link, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['id'] = $row['id'];
            header('location: ../profile/profile.php');
        }else {
            $login_password_err = "Sorry, the email or password is incorrect";
        }
    }
    mysqli_close($link);
}
