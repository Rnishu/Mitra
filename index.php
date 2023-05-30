<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mitra";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `tasks`";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<?php
while($row=mysqli_fetch_assoc($result)){
 
   echo "<div class='taskpost'>.
     <div class='titles'>.
        <div class='post-element tasktitle'>".$row['title']."</div>.
        <div class='post-element summary'>".$row['summary']."</div>.
     </div>.
     <div class='post-element Amount'>".$row['amount']."</div>.
     <div class='post-element Time'>".$row['deadline']."</div>.
     </div>";
}
?>
</body>
</html>