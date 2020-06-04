<?php
session_start();
?>

  <form method="post" action="server.php">
      <label for="name">First Name</label><br>
      <input type="text"  name="name"><br>
      <label for="l_name">Last Name</label><br>
      <input type="text"  name="l_name"><br>
      <label for="email">Email</label><br>
      <input type="text" name="email"><br>
      <label for="pass">Password</label><br>
      <input type="password" name="pass"><br>
      <label for="confpass">Confirm password</label><br>
      <input type="password" name="confpass"><br>
      <input type="submit">
  </form>

<?php
function main() {
    if (isset($_SESSION['err_name'])){
        echo $_SESSION['err_name'];
    }elseif (isset($_SESSION['err_email'])){
        echo $_SESSION['err_email'];
    }elseif (isset($_SESSION['err_pass'])){
        echo $_SESSION['err_pass'];
    }else{
        /* echo $_SESSION['succes']; */
        echo "OKKKKKKKKKKK";
    }
    session_unset();
}

main();
?>
