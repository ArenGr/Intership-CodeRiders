<?php
include "config.php";

$title = $price = $count = $description = "";
$title_err = $price_err = $count_err = $description_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $input_title = mysqli_real_escape_string($link, htmlspecialchars($_POST["title"]));
    if(empty($input_title)){
        $title_err = "Please enter a valid name";
    }

    $input_price = (float) $_POST["price"];
    if(empty($input_price) || !is_numeric($input_price)){
        $price_err = "Please enter a integer value";
    }

    $input_count = (int) $_POST["count"];
    if(empty($input_count) || !is_numeric($input_count)){
        $count_err = "Please enter a integer value";
    }

    $input_description = mysqli_real_escape_string($link, htmlspecialchars($_POST["description"]));
    if (empty($input_description)) {
        $description_err = "Please enter description for this product";
    }

    if(empty($title_err) && empty($price_err) && empty($count_err) && empty($description_err)){

        if(isset($_FILES["input_file"])){

            $sql_update_data = "UPDATE products SET title='$input_title', price='$input_price', count='$input_count', description='$input_description' WHERE id='$id'";

            if(mysqli_query($link, $sql_update_data)){
                $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $file_name_local = $_FILES["input_file"]["name"];
                $file_type = $_FILES["input_file"]["type"];
                $file_name_tmp = $_FILES["input_file"]["tmp_name"];
                $file_size = $_FILES["input_file"]["size"];
                if (!mysqli_query($link, $sql_update_data)) {
                    echo "Error: " . $sql_update_data . "<br>" . mysqli_error($link);
                }else{
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

                        $sql = "INSERT INTO product_images (product_id, name) VALUES ('$id', '$new_image_name')";
                        if (!mysqli_query($link, $sql)) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($link);
                        }
                    }
                    header('Location: index.php');
                }

            } else{
                header("location: error.php");
            }
        }
        mysqli_close($link);
    }
}else{

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        $sql_select = "SELECT * FROM products WHERE id = '$id'";

        if($result = mysqli_query($link, $sql_select)){
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);

                $title = $row["title"];
                $price = $row["price"];
                $count = $row["count"];
                $description = $row["description"];

                $sql_select_files = "SELECT * FROM product_images WHERE product_id = '$id'";

                if($result = mysqli_query($link, $sql_select_files)){
                    $dir = 'image_storage';
                    foreach ($result as $key => $value) {
                        $f_path = $dir.'/'.$value['name'];
                        if (file_exists($f_path)){
                            $image_data = base64_encode(file_get_contents($f_path));
                            echo '<div class="d-inline-block " style="margin:2%"><div><img src="data:image/jpeg;base64,'.$image_data.'" width="150" height="200"></div><div style="text-align:center"><button id="delete_image" class="btn btn-danger btn-sm" data-id=' . $value['id'] . ' data-name=' .$value['name'] . '>Delete</button></div></div>';
                        }else {
                            echo"the file dosnt exist";
                        }
                    }
                }
            } else{
                header("location: error.php");
            }

        } else{
            header("location: error.php");
        }

    }else{
        header("location: error.php");
    }

    mysqli_close($link);
}
include "update_page_form.php";
?>
