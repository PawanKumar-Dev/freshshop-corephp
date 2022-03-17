<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'freshshop';

// Create connection
$connection = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

?>