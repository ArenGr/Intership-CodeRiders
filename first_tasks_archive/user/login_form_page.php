<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Font+Name">
<style>
body{
  font-family: 'Balsamiq Sans';font-size: 22px;
  margin-top: 80px;
}
.container-fluid{
  width:500px;
}
article{
  max-width: 450px;
  background-color: #E9EBEB;
}
#button_login{
  background-color:#14b195;
}
</style>
<body>
  <div class="container-fluid">
    <div class="card bg-light">
      <article class="card-body mx-auto">
        <span >
          <img src="logo.png" class="img-fluid max-width: 100%;" alt="CodeRiders">
        </span>
          <h3 class="card-title mt-3 text-center">Login To Your Account</h3>
          <form action="login_logic_page.php" method="post">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              </div>
              <input name="input_user_name" class="form-control" placeholder="User name" type="text">
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="input_password" class="form-control" placeholder="Create password" type="password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success btn-block rounded" value="Login" id="button_login">
            </div>
          </form>
      </article>
    </div>
</body>
