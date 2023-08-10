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
  $res= mysqli_execute_query($conn, "UPDATE `tasks` SET status='U' WHERE POSTID=?",[$postid]);
  $amount=mysqli_execute_query($conn, "SELECT `amount` WHERE POSTID=?",[$postid]);
  $res2= mysqli_execute_query($conn, "UPDATE `scores` SET score=($_SESSION['current_score']-$amount) WHERE userid=$_SESSION['userid']");
  $res3= mysqli_execute_query($conn, "UPDATE `scores` SET score=($_SESSION['acc_score']+$amount) WHERE userid=$_SESSION['acc_partner']");
}
?>