<?php
session_start();

include "../config/config.php";

$user_name_err = $user_email_err = $user_password_err = "";

if (isset($_POST['submit'])) {
    $user_name = $_POST['input_user_name'];
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];
    $conf_password = $_POST['input_conf_password'];

    if(empty($user_name) || (!preg_match("/^[a-zA-Z-'\s]+$/", $user_name))){
        $user_name_err = "Sorry, user name is required.";
    }else {
        $user_name = mysqli_real_escape_string($link, htmlspecialchars($user_name));
    }

    if(empty($email) || !(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $user_email_err = "Sorry, invalid email.";
    }else{
        $email = mysqli_real_escape_string($link, htmlspecialchars($email));
    }

    if (empty($password) || empty($conf_password) || $password != $conf_password) {
        $user_password_err = "Sorry, your password dosn`t match. Please, try again.";
    }

    $user_check_query = "SELECT * FROM users WHERE user_name='$user_name' OR email='$email' LIMIT 1";

    if ($result = mysqli_query($link, $user_check_query)) {
        $user = mysqli_fetch_assoc($result);
        if ($user['email']===$email) {
            $user_email_err = "Email already exists";
        }
    }

    if (empty($user_name_err) && empty($user_email_err) && empty($user_password_err)) {
        $password = md5($password);
        $query_insert ="INSERT INTO users (user_name, email, password, avatar) VALUES ('$user_name', '$email', '$password', '')";

        if (!$result = mysqli_query($link, $query_insert)) {
            header('Location: ../errors/error.php');
        }else{
            $_SESSION['username'] = $user_name;
            header('Location: ../index/index.php');
        }
    }
    mysqli_close($link);
}
?>
