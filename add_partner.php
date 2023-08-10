<?php
session_start();
require('dbconnect.php');
require('functions.php');
if($_SERVER['method']=="post"){
    $acc_partner=mysqli_execute_query($conn, "SELECT `userid` FROM users2009 WHERE USERNAME=?",[$_SERVER['acc_partner']]);
    $res= mysqli_execute_query($conn, "UPDATE `users2009` SET acc_partner=? WHERE POSTID=?",[$acc_partner,$postid]);
    if($res==false) echo "invalid userid"
    $_SESSION['acc_partner']=$acc_partner;
}
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
    <form method="POST" action="add_partner.php">
    <h2>Add A Partner</h2>
    <div class="user-box">
      <input type="text" name="acc_partner" required="">
      <label>Enter Username</label>
    </div>
    <a onclick="document.querySelector('form').submit()" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
        </a>
    </body>
</html>