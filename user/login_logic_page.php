<?php
session_start();

include "config.php";
include "login_form_page.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $login_user_name = $_POST['input_user_name'];
    $login_password = $_POST['input_password'];

    $sql_select = "SELECT * FROM users_data WHERE user_name = $login_user_name";   

    var_dump("hello");
    if ($result = mysqli_query($link, $sql_select)) {
       var_dump($result); 
       exit;
    }
}
