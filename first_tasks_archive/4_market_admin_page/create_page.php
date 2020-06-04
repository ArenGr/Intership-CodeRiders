<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_title = mysqli_real_escape_string($link, htmlspecialchars($_POST["title"]));
    if(empty($input_title)){
        die("Please enter a name.");
    }

    $input_price = (float) $_POST["price"];
    if(empty($input_price)){
        die("Please enter a price.");
    }

    $input_count = (int) $_POST["count"];
    if(empty($input_count) || !is_numeric($input_count)){
        die("Please enter the integer value.");
    }

    $input_description = mysqli_real_escape_string(htmlspecialchars($_POST["description"]));

    $sql ="INSERT INTO products (title, price, count, description) VALUES ('$input_title', '$input_price', '$input_count', '$input_description')";

    if (!mysqli_query($link, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    } else {
        header('Location: index.php');
    }
}

var_dump($_GET);
mysqli_close($link);
?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
  .wrapper{
  width: 500px;
  margin: 0 auto;
  }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h2>Create Record</h2>
          </div>
          <p>Please fill this form and submit to add product record to the database.</p>
          <form action="" method="post">
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label>Count</label>
              <input type="text" name="count" class="form-control">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Save">
            <a href="index.php" class="btn btn-default">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
