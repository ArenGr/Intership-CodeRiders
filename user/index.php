<?php
include "registration_logic_page.php";
?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>
body{
  margin-top: 30px;
font-family: 'Montserrat', sans-serif;
}
.container-fluid{
  width:500px;
}
article{
  max-width: 450px;
  background-color: #E9EBEB;
}
#button_create_account{
  background-color:#14b195;
}
.help-block{
  font-size: 12px;
  color: red;
  margin-left: 37px;
}
h4{
   color:#CEE6E6;
}
</style>
<body>
  <div class="container-fluid">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <span>
          <img src="logo.png" class="img-fluid " alt="CodeRiders">
        </span>
        <h4 class="card-title mt-3 text-center">create your account</h4>
        <form action="index.php" method="post">
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              <input name="input_user_name" class="form-control" placeholder="User name" type="text">
            </div>
            <div> <?php if (!empty($user_name_err)):?><span class="help-block"><?php echo $user_name_err ?></span><?php endif;?> </div>
          </div>
          <div class="form-group input-group">
            <div class="input-group">
              <span class="input-group-text" style="font-size:11px;"> <i class="fa fa-envelope"></i> </span>
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
            <input type="submit" class="btn btn-success btn-block rounded" name="submit" value="create account" id="button_create_account">
          </div>
          <p class="text-center"><i>Have an account? </i><a href="login_form_page.php" style="color:#02b3e4">log in</a> </p>
        </form>
      </article>
    </div>
</body>
