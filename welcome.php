<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
  }
echo $_SESSION["user_id"];
echo "<h2>HELLO WORLD</h2>"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="index.css" rel="stylesheet" />
  </head>
  <body>
    <a href="logout.php">logout</a>
  </body>
</html>
