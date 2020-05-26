<?php
include "registration.php";
?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../styles/style.css" />
<body>
  <div class="container-fluid">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <span>
          <img src="../images/logo.png" class="img-fluid " alt="CodeRiders">
        </span>
        <h4 class="card-title mt-3 text-center">create your account</h4>
        <form action="" method="post">
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              <input name="input_user_name" class="form-control" placeholder="User name" type="text">
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              <input name="input_email" class="form-control" placeholder="Email address">
            </div>
            <div>
              <?php if (!empty($user_email_err)):?><span class="help-block"><?php echo $user_email_err ?></span><?php endif;?>
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            <input name = "input_password" class="form-control" placeholder="Enter password" type="password">
            </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            <input name = "input_conf_password" class="form-control" placeholder="Repeat password" type="password">
            </div>
              <div>
                <?php if (!empty($user_password_err)):?><span class="help-block"><?php echo $user_password_err ?></span><?php endif;?>
              </div>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success btn-block rounded" name="submit" value="create account" id="button">
          </div>
          <p class="text-center"><i>Have an account? </i><a href="../index/index.php">log in</a> </p>
        </form>
      </article>
    </div>
</body>
