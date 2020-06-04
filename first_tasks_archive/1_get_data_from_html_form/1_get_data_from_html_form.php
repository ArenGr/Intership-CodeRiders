  <form method="post">
  <label for="name">Name</label><br>
  <input type="text"  name="name" required><br>
  <label for="email">Email</label><br>
  <input type="email" name="email" required><br>
  <label for="pass">Password</label><br>
  <input type="password" name="pass" required><br>
  <label for="confpass">Confirm password</label><br>
  <input type="password" name="confpass" required><br>
  <input type="submit">
  </form>
<?php
function cheack_passwd() {
    if ($_POST["pass"] !== $_POST["confpass"]){
        echo "Your password dosn`t match. Please try again!!!<br>";
        exit;
    }
}

function return_text() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        cheack_passwd();
        foreach ($_POST as $value) {
            echo $value."<br>" ;
        }
    }
}
return_text();
?>
