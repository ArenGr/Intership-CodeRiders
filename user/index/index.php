<?php
include "../login/login.php";
?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<link rel="stylesheet" type="text/css" href="../styles/style.css" />
<body>
  <div class="container-fluid">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <span >
          <img src="../images/logo.png" class="img-fluid max-width: 100%;" alt="CodeRiders">
        </span>
          <h4 class="card-title mt-3 text-center">login to your account</h4>
          <form action="" method="post">
            <div class="form-group input-group">
              <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                <input name="input_email" class="form-control" placeholder="Enter email" type="text">
              </div>
              <div> <?php if (!empty($login_email_err)):?><span class="help-block"><?php echo $login_email_err ?></span><?php endif;?> </div>
            </div>
            <div class="form-group input-group">
              <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                <input name="input_password" class="form-control" placeholder="Enter password" type="password">
              </div>
              <?php if (!empty($login_password_err)):?><span class="help-block"><?php echo $login_password_err ?></span><?php endif;?>
              <div>
                <?php if (!empty($login_user_err)):?><span class="help-block"><?php echo $login_user_err ?></span><?php endif;?>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success btn-block rounded" value="login" name="login_submit" id="button">
            </div>
            <p class="text-center"><i>Have an account? </i><a href="../registration/registration_form.php" id="sign">sign up</a> </p>
          </form>
      </article>
    </div>
</body>
