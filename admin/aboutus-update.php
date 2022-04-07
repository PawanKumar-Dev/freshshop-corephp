<?php
session_start();
ob_start();

require_once 'connect.php';

if(isset($_POST['aboutupdate'])) {

	$main_text = $_POST['main_text'];
  $up_id = $_POST['up_id'];

  $main_img = $_FILES["main_img"]["name"];

  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["main_img"]["name"]);

  $sql = "update aboutpage set main_text = '$main_text', main_img = '$main_img' where id = $up_id";

  if (mysqli_query($connection, $sql)) {

    move_uploaded_file($_FILES["main_img"]["tmp_name"], $target_file);

    $_SESSION['msg'] = "About Us updated!";
    header('Location: http://localhost/freshshop/admin-aboutus.php');
    exit;

  } else {

    $_SESSION['msg'] = "About Us update failed!";
    header('Location: http://localhost/freshshop/admin-aboutus.php');
    exit;
    
	}
}

?>