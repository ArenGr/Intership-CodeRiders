<?php
include "config.php";
if (isset($_GET['delete_image'])) {

    $id = $_GET['id'];
    $file_name = $_GET['name'];

    $sql_delete = "DELETE FROM product_images WHERE id=$id";
    if (mysqli_query($link, $sql_delete)) {
        $dir = 'image_storage';
        $directory_content = scandir($dir);
        if (in_array($file_name, $directory_content)){
            $file_path = $dir.'/'.$file_name;
            unlink($file_path);
            exit();
        }
    }
}
