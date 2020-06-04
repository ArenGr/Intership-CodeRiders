<?php
session_start();

include 'config.php';

$a = $_SESSION["f_name"];
$b = $_SESSION["l_name"];
$c = $_SESSION["email"];
$d = $_SESSION["password"];

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql ="INSERT INTO users (f_name, l_name, email, password) VALUES ('$a', '$b', '$c', '$d')";

if (mysqli_query($connection, $sql)) {
    echo "Your registration has been successful."."<br/>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

$sql = "SELECT id, f_name, l_name, email, password FROM users WHERE email='$c'";

if ($result = mysqli_query($connection, $sql)) {
    foreach (mysqli_fetch_assoc($result) as $key => $value) {
        print "$key"." ---> "."$value\r\n"."<br/>";    
    }
    $result->close();
}

mysqli_close($connection);








