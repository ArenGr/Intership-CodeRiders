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
        //show images
        $sql_select_files = "SELECT * FROM product_images WHERE product_id = '$id'";

        if($result = mysqli_query($link, $sql_select_files)){
          $files_name_arr = array();

          $dir = 'image_storage';
          $directory_content = scandir($dir);
          foreach ($result as $key => $value) {
            if (in_array($value['name'], $directory_content)){
              $f_path = $dir.'/'.$value['name'];
              $image_data = base64_encode(file_get_contents($f_path));
              echo '<div class="d-inline-block " style="margin:2%"><div><img src="data:image/jpeg;base64,'.$image_data.'" width="150" height="200"></div><div style="text-align:center"><button id="delete_image" class="btn btn-danger btn-sm" data-id=' . $value['id'] . ' data-name=' .$value['name'] . '>Delete</button></div></div>';
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
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Update Record</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script_image.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style type="text/css">
.wrapper{
  width: 500px;
  margin: 0 auto;
  margin-top: 20px;
}
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2>Update Record</h2>
            </div>
            <p>Please edit the input values and submit to update the record.</p>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                <span class="help-block"><?php echo $title_err;?></span>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                <span class="help-block"><?php echo $price_err;?></span>
              </div>
              <div class="form-group">
                <label>Count</label>
                <input type="text" name="count" class="form-control" value="<?php echo $count; ?>">
                <span class="help-block"><?php echo $count_err;?></span>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" name="description" class="form-control" value="<?php echo $description;?>"></textarea>
                <span class="help-block"><?php echo $description_err;?></span>
              </div>
              <div class="form-group">
                <div class="custom-file" id="customFile" lang="es">
                  <input type="file" class="custom-file-input"  name="input_file[]" id="input-file" aria-describedby="fileHelp" multiple>
                  <label class="custom-file-label" for="input-file">
                    Select file...
                  </label>
                  <?php if (!empty($file_size_err)):?><span class="help-block"></span><?php endif;?>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $id; ?>"/>
              <input type="submit" class="btn btn-success" value="Save">
              <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
