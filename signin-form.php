<?php
require('dbconnect.php');
require('functions.php');
$errors=[];
$username=$pass=$confirmpass=$userid='';
//prepare and bind the parameters
$sql = mysqli_prepare($conn, "INSERT INTO users2009(userid, username, userpass) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($sql, "sss", $userid, $username, $userpass);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = sanitize($_REQUEST['username']);
  $userpass = sanitize($_REQUEST['userpass']);
  $confirmpass = sanitize($_REQUEST['confirmpass']);
  // prepare, bind, and execute queery to get all rows with same username
  $op =mysqli_execute_query($conn, 'SELECT * FROM users2009 WHERE username = ?', [$username]);
  // Check if any rows were returned
  if (mysqli_num_rows($op) > 0) {
    // Username already exists
    $errors['username']="Username already taken";
  } 
  //check if password is same as confirm password
  if ($confirmpass!=$userpass){
    //password does not match conofirm password
    $errors['confirmpass']='Passwords do not match';
  }
  if(empty($errors))
  {
   $userpass=password_hash($userpass, PASSWORD_DEFAULT);
   $userid=uniqid();
   mysqli_stmt_execute($sql);
   $result = mysqli_stmt_get_result($sql);
   session_start();
   $_SESSION['logged-in']= true;
   $_SESSION['userid']=$userid;
   $_SESSION['username']=$username;
   header("Location: index.php");
   exit;
  } 
}
$sql->close();
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
  <h2>Sign In</h2>
  <form method="post" action="signin-form.php">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
      <?php if (isset($errors['username'])): ?>
      <span style="color:red;"><?php echo $errors['username']; ?></span>
      <?php endif; ?>
    </div>
    <div class="user-box">
      <input type="password" name="userpass" required="">
      <label>Password</label>
    </div>
    <div class="user-box">
        <input type="password" name="confirmpass" required="">
        <label>Confirm Password</label>
        <?php if (isset($errors['confirmpass'])): ?>
      <span style="color:red;"><?php echo $errors['confirmpass']; ?></span>
      <?php endif; ?>
      </div>

    <a onclick="document.querySelector('form').submit()" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
        </a>
    <a href="login-form.php">already have an account?</a>
  </form>
</div>
    </body>
</html>
