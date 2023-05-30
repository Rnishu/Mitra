<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cwhDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Employees (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/form.css">
    </head>
    <body>
        <div class="login-box">
  <h2>New Post</h2>
  <form method="post" action="task-form.php">
    <div class="user-box">
      <input type="text" name="title" required="">
      <label>Title</label>
    </div>
    <div class="user-box">
      <input type="text" name="summary" required="">
      <label>Summary</label>
    </div>
    <div class="user-box">
        <input type="number" name="amount" required="">
        <label>Amount</label>
      </div>
      <div class="user-box">
        <input type="DATETIME" name="deadline" required="">
        <label>amount</label>
      </div>
      <input type="submit">

    <btn a href="index.html" >
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
</a btn>
    <a href="index.php" style="font-size: small;">back home?</a>
  </form>
</div>
    </body>
</html>
