<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
  .wrapper{
      width: 650px;
      margin: 0 auto;
  }
  .page-header h2{
      margin-top: 0;
  }
  table tr td:last-child a{
      margin-right: 15px;
  }
</style>
<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Products List</h2>
            <a href="create_page.php" class="btn btn-success pull-right">Create</a>
          </div>

<?php
include "config.php";
$sql = "SELECT * FROM products";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    echo "<table class='table table-bordered table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Title</th>";
    echo "<th>Price</th>";
    echo "<th>Count</th>";
    echo "<th>Description</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['title']."</td>";
      echo "<td>".$row['price']."</td>";
      echo "<td>".$row['count']."</td>";
      echo "<td>".$row['description']."</td>";
      echo "<td>";
      echo "<span class='glyphicon glyphicon-pencil'></span>";
      echo "<span class='glyphicon glyphicon-trash'></span>";
      echo "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

  } else{
    echo "<p class='lead'>No records were found.</p>";
  }
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
