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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_REQUEST['title'];
  $summary = $_REQUEST['summary'];
  $amount = $_REQUEST['amount'];
  $deadline = $_REQUEST['deadline'];//Collecting Value
  $sql = "INSERT INTO tasks(title, summary, amount, deadline)
  VALUES ('$title', '$summary', '$amount','$deadline')";
  $result=mysqli_query($conn,$sql);
  header("Location: index.php");
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
  <h2>Login</h2>
  <form action="task-form.php" method="post">
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
    <input type="submit">

    <a href="#">
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
