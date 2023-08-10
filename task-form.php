<?php
session_start();
if(!isset($_SESSION['logged-in']) || $_SESSION['logged-in'] != true)
{
  header("Location:login-form.php");
  exit;
}
require('dbconnect.php');
require('functions.php');
$userid=$title=$summary=$amount=$postid='';
$sql = mysqli_prepare($conn, "INSERT INTO tasks(postid, userid, title, summary, amount) VALUES (?,?, ?, ?, ?)");
  mysqli_stmt_bind_param($sql, "ssssi",$postid, $userid, $title, $summary, $amount);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userid=$_SESSION['userid'];
  $title = sanitize($_REQUEST['title']);
  $summary = sanitize($_REQUEST['summary']);
  $amount = $_REQUEST['amount'];
  $deadline = $_REQUEST['deadline'];
  $postid = uniqid();//Collecting Value
  mysqli_stmt_execute($sql);
  $op = mysqli_query($conn,"UPDATE `tasks` SET deadline='$deadline' where postid='$postid'");
  $result=mysqli_stmt_get_result($sql);
  header("Location: index.php");
  exit;
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
  <form id="NewTask" action="task-form.php" method="post">
    <div class="user-box">
      <input type="text" name="title" required="">
      <label>title</label>
    </div>
    <div class="user-box">
      <input type="text" name="summary" required="">
      <label>summary</label>
    </div>
    <div class="user-box">
      <input type="number" name="amount" required="">
      <label>Amount</label>
    </div>
    <div class="user-box">
      <input type="datetime-local" name="deadline" required=""
       onfocus="this.placeholder = ''"
       onblur="this.placeholder = 'Select date and time'"
       placeholder="Select date and time" />
      <label>deadline</label>
    </div>

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
