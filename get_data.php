<?php
session_start();
if(!isset($_SESSION['logged-in']) && $_SESSION!=true)
{
    header("Location:login-form.php");
    exit;
}
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    // Redirect or return an error response
    header('HTTP/1.0 403 Forbidden');
    exit('Access denied');
  }
require('dbconnect.php');
$send=mysqli_execute_query($conn, "SELECT `postid`,`deadline` FROM `tasks` WHERE userid = ? AND status='P'",[$_SESSION['userid']]);
$jsondata=json_encode($send);
header('Content-Type: application/json');
echo $jsonData;
?>