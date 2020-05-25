<?php
include "config.php";
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=".$id;
    mysqli_query($link, $sql);
    exit();
}
