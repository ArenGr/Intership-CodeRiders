<?php
session_start();
include 'profile_image_change.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login/login_form.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../login/login_form.php");
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../scripts/script.js"></script>
<link rel="stylesheet" type="text/css" href="../styles/style_profile.css" />

<body>
 <div class="container mb-2 mt-2 ml-10" id="header">
    <div class="row">
      <div class="col-lg-5 col-md-20 mb-lg-1 pl-1 pt-1 mb-4">
        <div class="card testimonial-card" id="avatar">
          <div id="image_preview" class="avatar mx-auto white mt-4" >
            <img id="previewing" src='../images/avatar.png' class="img-fluid img-thumbnail">
          </div>
<div id="message"></div>
            <div class="card-body">
              <form  action="" method="post" enctype="multipart/form-data">
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
                    <input id="uploadimage" type="submit" class="btn btn-outline-success ml-5" name="submit" value="Change">
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
          <a href="../login/login_form.php?logout='1'" class="btn btn-outline-danger mt-4 ">Logout</a>
        </div>
        <div id="data">
        <span class="user_info"> <b>Name:</b> <?= $_SESSION['username']?></span><br>
          <br>

          <span class="user_info"> <b>Email:</b> <?= $_SESSION['email']?></span><br>
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
