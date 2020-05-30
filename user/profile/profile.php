<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index/index.php');
}
include 'profile_image_change.php';
$user =mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id=".$_SESSION['id']));
$dir = '../user_images/';
$avatar = '<img src="'.$dir.$user['avatar'].'" class="img-fluid img-thumbnail" width="200">'; 
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/style_profile.css" />
<!-- <script src="../scripts/script.js"></script> -->

<body>
 <div class="container mb-2 mt-2 ml-10" id="header">
    <div class="row">
      <div class="col-lg-5 col-md-20 mb-lg-1 pl-1 pt-1 mb-4">
        <div class="card testimonial-card" id="avatar">
          <div id="image_preview" class="avatar mx-auto white mt-4" >
            <?php echo !isset($avatar) ? '<img src="../images/avatar.png" id="previewing" class="img-fluid img-thumbnail">' : $avatar;?>
          </div>
<div id="message"></div>
            <div class="card-body">
              <form  id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="custom-file" id="customFile" lang="es">
                    <input type="file" class="custom-file-input"  name="image[]" id="input-file" multiple>
                    <label class="custom-file-label" for="input-file">
                      Select file...
                    </label>
                  </div>
                </div>
                <div class="ml-5">
                  <div class="ml-5">
                    <input  type="submit" class="btn btn-outline-success ml-5" name="submit" value="Change">
                  </div>
                </div>
              </form>
              <hr>
              <p class="dark-grey-text mt-4 ml-5"><i class="fa fa-quote-left pr-5"></i><b>Web Software Developer </b></p>
            </div>
        </div>
      </div>
      <div>
        <div id="logout">
          <a href="../logout/logout.php" class="btn btn-outline-danger mt-4 ">Logout</a>
        </div>
        <div id="data">
        <span class="user_info"> <b>Name:</b> <?=$user['user_name']?> </span><br>
          <br>
          <span class="user_info"> <b>Email:</b> <?=$user['email']?></span><br>
          <br>
          <span class="user_info"> <b>Phone number:</b> +3 111 1111111</span>
          <br>
          <br>
          <span class="user_info"> <b>Skills: </b>PHP, JavaScript, Python</span>
        </div>
      </div>
    </div>
  </div>
</body>
