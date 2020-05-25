<?php
session_start();

include "../config/config.php";

$login_user_name_err = $login_password_err = "";

if(isset($_POST['login_submit'])){

    $login_user_name = mysqli_real_escape_string($link, $_POST['input_user_name']);
    $login_password = mysqli_real_escape_string($link, $_POST['input_password']);

    if (empty($login_user_name)) {
        $login_user_name_err = "Sorry, user name is required";
    }
    if (empty($login_password)) {
        $login_password_err = "Sorry, password is required";
    }

    if (empty($login_user_name_err) && empty($login_password_err)) {
        /* $login_password = md5($login_password); */
        $query = "SELECT * FROM users_data WHERE user_name='$login_user_name' AND password='$login_password'";
        $results = mysqli_query($link, $query);
        /* $email = mysqli_fetch_assoc($results)['email']; */
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $login_user_name;
            $_SESSION['password'] = $login_password;
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header('location: ../profile/profile.php');
        }else {
            $login_user_err = "Sorry, the username or password is incorrect";
        }
    }
}
