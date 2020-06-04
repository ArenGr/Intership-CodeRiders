<?php
session_start();

function cheack_name() {
    if(!($_POST['name']) || (!preg_match("/^[a-zA-Z-'\s]+$/", $_POST['name']))){
        $_SESSION['err_name'] = "Sorry invalid name.";
    }
}

function cheack_name_last() {
    if(!($_POST['l_name']) || (!preg_match("/^[a-zA-Z-'\s]+$/", $_POST['name']))){
        $_SESSION['err_name'] = "Sorry invalid last name.";
    }
}

function cheack_email() {
    if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
        $_SESSION['err_email'] = "Sorry invalid email.";
    }
}

function cheack_passwd() {
    if (!($_POST['pass']) || ($_POST['pass'] !== $_POST['confpass'])){
        $_SESSION['err_pass']="Your password dosn`t match. Please, try again.";
    }
}

function combine() {
    cheack_name();
    cheack_email();
    cheack_passwd();
}

combine();

if (!empty($_SESSION)) {
    header('Location: main.php');
}else {
    $_SESSION['f_name'] = $_POST['name'];
    $_SESSION['l_name'] = $_POST['l_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['pass'];
    header('Location: user_account.php');
}

