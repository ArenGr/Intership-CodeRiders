<?php
include "config.php";
include "create_page_form.php";

$file_size_err= $file_type_err ="";
$title_err = $price_err = $count_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_title = mysqli_real_escape_string($link, htmlspecialchars($_POST["title"]));
    if(empty($input_title)){
        $title_err = "Please enter a name.";
    }

    $input_price = (float) $_POST["price"];
    if(empty($input_price)){
        $price_err = "Please enter a price.";
    }

    $input_count = (int) $_POST["count"];
    if(empty($input_count) || !is_numeric($input_count)){
        $count_err = "Please enter the integer value.";
    }

    $input_description = mysqli_real_escape_string($link, htmlspecialchars($_POST["description"]));

    if(isset($_FILES["input_file"])){
        $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $file_name_local = $_FILES["input_file"]["name"];
        $file_type = $_FILES["input_file"]["type"];
        $file_name_tmp = $_FILES["input_file"]["tmp_name"];
        $file_size = $_FILES["input_file"]["size"];
        $sql ="INSERT INTO products (title, price, count, description) VALUES ('$input_title', '$input_price', '$input_count', '$input_description')";
        if (!mysqli_query($link, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
        }else{
            $last_inserted_id = mysqli_insert_id($link);

            foreach ($file_name_local as $key => $value) {

                $ext = pathinfo($file_name_local[$key], PATHINFO_EXTENSION);

                if(!array_key_exists($ext, $allowed_types))
                    $file_type_err = "Error: Please select a valid file format.";

                $maxsize = 100 * 1024 * 1024;

                if($file_size[$key] > $maxsize) {
                    $file_size_err = "Error: File size is larger than the allowed_types limit.";
                }
                
                if(in_array($file_type[$key], $allowed_types)){
                    $new_image_name = round(microtime(true) * 1000).'.'.$ext;
                    move_uploaded_file($file_name_tmp[$key], "image_storage/".$new_image_name);
                }else {
                    $file_type_err = "Error: Please select a valid file format.";
                }

                $sql = "INSERT INTO product_images (product_id, name) VALUES ('$last_inserted_id', '$new_image_name')";

                if (!mysqli_query($link, $sql)) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($link);
                }
            }
            header('Location: index.php');
        }
    }
    mysqli_close($link);
}

