<?php
session_start();
require('dbconnect.php');
if(!isset($_SESSION['logged-in']) || $_SESSION['logged-in'] != true)
{
  header("Location:login-form.php");
  exit;
}

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_REQUEST['postid']))
{
  $postid= $_REQUEST['postid'];
  $res= mysqli_execute_query($conn, "UPDATE `tasks` SET status='C' WHERE POSTID=?",[$postid]);
}

$result = mysqli_execute_query($conn, "SELECT * FROM `tasks` WHERE userid = ? AND status='P'", [$_SESSION['userid']]);
$num=mysqli_num_rows($result);
$i=0;
?>
<!DOCTYPE html>
<html>
<head>
    <script src="./js/homepage.js"></script>
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <div class="navbar">
  <a href="task-form.php">New Post</a>
</div>
<div class="task-container">
<?php

while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="taskpost" data-postid="'.$row['postid'].'">';
  echo '<button class="post-element checkbox" onclick="taskComplete(this)"></button>';
  echo  '<div class="titles">';
  echo    '<div class="post-element tasktitle">'.$row["title"].'</div>';
  echo    '<div class="post-element summary">'.$row["summary"].'</div>';
  echo '</div>';
  echo '<div class="post-element Amount">'.$row["amount"].'</div>';
  echo '<div class="post-element Time">'.$row["deadline"].'</div>';
  echo '</div>';
}
?>
</div>
</body>
</html>