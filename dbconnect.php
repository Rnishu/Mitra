<?php
$DB_servername = "localhost";
$DB_username = "root";
$DB_password = "";
$DB_name = "mitra";


// Create connection
$conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>