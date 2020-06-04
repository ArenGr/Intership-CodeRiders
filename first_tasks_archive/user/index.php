<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
<style>
  body{
    margin-top: 30px;
    font-family: 'Balsamiq Sans';font-size: 22px;
}
.container-fluid{
    width:500px;
}
article{
    max-width: 400px;
    background-color: #E9EBEB;
}
#button_create_account{
    background-color:#14b195;
}
</style>
<body>
  <div class="container-fluid">
    <div class="card bg-light">
    <article class="card-body mx-auto">
    <span>
      <img src="logo.png" class="img-fluid " alt="CodeRiders">
    </span>
        <h4 class="card-title mt-3 text-center">Create Your Account</h4>
        <form action="registration_logic_page.php" method="post">
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
              <input name="input_user_name" class="form-control" placeholder="User name" type="text">
                  <?php if (!empty($user_name_err)):?><span class="help-block">Errro</span><?php endif;?>
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
              <input name="input_email" class="form-control" placeholder="Email address">
                  <?php if (!empty($user_email_err)):?><span class="help-block"></span><?php endif;?>
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="input_password" class="form-control" placeholder="Create password" type="password">
          </div>
          <div class="form-group input-group">
              <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name = "input_conf_password" class="form-control" placeholder="Repeat password" type="password">
                  <?php if (!empty($user_password_err)):?><span class="help-block"></span><?php endif;?>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-success btn-block rounded" value="Create Account" id="button_create_account">
          </div>
          <p class="text-center"><i>Have an account? </i><a href="login_form_page.php" style="color:#02b3e4">Log In</a> </p>
      </form>
    </article>
  </div>
</body>
