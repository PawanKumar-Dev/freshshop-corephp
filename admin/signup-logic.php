<?php
session_start();
ob_start();

require_once 'connect.php';

if(isset($_POST['signup'])){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $email = mysqli_real_escape_string($connection, $email);
  $name = mysqli_real_escape_string($connection, $name);
  $password = mysqli_real_escape_string($connection, $password);

  $hashedPass = password_hash($password, PASSWORD_BCRYPT);

  $sql = "insert into users (username, name, email, password, role) values('$username', '$name', '$email', '$hashedPass', 'user')";


  if(mysqli_query($connection, $sql)) {

    $_SESSION['msg'] = "Signup Successful.";
    header('Location: http://localhost/freshshop/login.php');
    exit;

  } else {

    $_SESSION['msg'] = "Signup Failed!";
    header('Location: http://localhost/freshshop/signup.php');
    exit;

  }
}

?>