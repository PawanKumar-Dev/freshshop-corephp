<?php
session_start();
ob_start();

require_once 'connect.php';

if(isset($_POST['update'])) {

	$info = $_POST['info'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $up_id = $_POST['up_id'];

  $sql = "update contactpage set info = '$info', address = '$address', phone = '$phone', email = '$email' where id = $up_id";

  if (mysqli_query($connection, $sql)) {
  $_SESSION['msg'] = "Contact Us page Updated!";
  header('Location: http://localhost/freshshop/admin-contact.php');
  exit;

  } else {
    $_SESSION['msg'] = "Contact Us page update failed!";
    header('Location: http://localhost/freshshop/admin-contact.php');
    exit;
	}
}

?>