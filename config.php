<?php
$hostname = "localhost";
$username ="root";
$password = "";
$db_name = "login_register_db";

$conn = mysqli_connect($hostname, $username, $password, $db_name) or die("database connection failed");
