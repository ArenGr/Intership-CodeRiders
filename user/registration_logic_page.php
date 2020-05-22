<?php

$user_name_err = $user_email_err = $user_password_err = "";

include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $user_name = $_POST['input_user_name'];
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];
    $conf_password = $_POST['input_conf_password'];

    $sql_select_user_name = "SELECT user_name FROM users_data";
    if ($result = mysqli_query($link, $sql_select_user_name)) {
        $user_name_arr = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($user_name_arr, $row['user_name']);
        }
    }

    if(empty($user_name) || (!preg_match("/^[a-zA-Z-'\s]+$/", $user_name))){
       $user_name_err = "Sorry, invalid user name.";
    }elseif(in_array($user_name, $user_name_arr)){
        $user_name_err = "The user name already exists. Please use a different user name";
    }else {
        $user_name = mysqli_real_escape_string($link, htmlspecialchars($user_name));
    }

    if(!($email) || !(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $user_email_err = "Sorry, invalid email.";
    }

    if (!($password) || !($conf_password) || $password != $conf_password) {
        $user_password_err = "Your password dosn`t match. Please, try again.";
    }

    $insert_query ="INSERT INTO users_data (user_name, email, password) VALUES ('$user_name', '$email', '$password')";

    if (!$result = mysqli_query($link, $insert_query)) {
        header('Location: error.php');
    }else{
        header('Location: login_form_page.php');
    }
    mysqli_close($link);
}
?>
