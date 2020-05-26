<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin_30');
define('DB_PASSWORD', 'areN_1990');
define('DB_NAME', 'site');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

