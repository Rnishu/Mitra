<?php
require('dbconnect.php');
$errors='';
$username=$pass=$confirmpass=$userid='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_REQUEST['username'];
  $userpass = $_REQUEST['userpass'];
  // prepare, bind, and execute queery to get all rows with same username
  $result = mysqli_execute_query($conn, 'SELECT * FROM `users2009` WHERE username = ?', [$username]);
  $op=mysqli_fetch_assoc($result);
  if ($op === null) {
    $errors = 'Invalid Credentials';
} elseif (!password_verify($userpass, $op['userpass'])) {
    $errors = 'Invalid Credentials';
}

  if(empty($errors))
  {
    session_start();
    $_SESSION['logged-in']= true;
    $_SESSION['username']= $username;
    $_SESSION['userid']= $op['userid'];
    $_SESSION['acc_partner']=$op['acc_partner'];
    header("Location: index.php");
    exit;
  } 
}
$conn->close();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/form.css">
    </head>
    <body>
        <div class="login-box">
  <h2>Login</h2>
  <form method="POST" action="login-form.php">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="userpass" required="">
      <label>Password</label>
    </div>
    <span style="color:red;"><?php echo $errors; ?></span>
    <a onclick="document.querySelector('form').submit()">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
    <a href="signin-form.php">New here? Sign In</a>
  </form>
</div>
    </body>
</html>