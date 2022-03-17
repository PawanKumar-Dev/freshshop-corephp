<?php
session_start();
ob_start();

require 'connect.php';

if (isset($_GET['del_id'])) {
	
	$del_id = $_GET['del_id'];
	$sql = "delete from products where id = $del_id";

	if (mysqli_query($connection, $sql)) {

	  $_SESSION['msg'] = "Product deleted successfully.";
    header('Location: http://localhost/freshshop/products.php');
    exit;

	} else {
	  $_SESSION['msg'] = "Product deleted failed.";
    header('Location: http://localhost/freshshop/products.php');
    exit;
	}
}

?>