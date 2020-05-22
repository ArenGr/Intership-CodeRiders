<?php
session_start();

include "config.php";

$login_user_name_err = $login_password_err = "";

if(isset($_POST['login_submit'])){

    $login_user_name = mysqli_real_escape_string($link, $_POST['input_user_name']);
    $login_password = mysqli_real_escape_string($link, $_POST['input_password']);

    if (empty($login_user_name)) {
        $login_user_name_err = "Username is required";
    }
    if (empty($login_password)) {
        $login_password_err = "Password is required";
    }

    if (empty($login_user_name_err) && empty($login_password_err)) {
        /* $login_password = md5($login_password); */
        $query = "SELECT * FROM users_data WHERE user_name='$login_user_name' AND password='$login_password'";
        $results = mysqli_query($link, $query);
        if (mysqli_num_rows($results) == 1) {
            /* $_SESSION['username'] = $username; */
            /* $_SESSION['success'] = "You are now logged in"; */
            header('location: user_profile.php');
        }else {
            $login_user_err = "Wrong username or password combination";
        }
    }else{
        echo "errr";
    }
}



