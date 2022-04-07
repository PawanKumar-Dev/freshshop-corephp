<?php
session_start();
ob_start();

require_once 'connect.php';

if(isset($_POST['update_product'])){

	$product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $stock = $_POST['stock'];
  $up_id = $_POST['up_id'];

  $image_link = $_FILES["image_link"]["name"];

  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["image_link"]["name"]);

  $sql = "update products set product_name = '$product_name', description = '$description', price = '$price', category = '$category', stock = '$stock', image_link = '$image_link' where id = $up_id";

  if (mysqli_query($connection, $sql)) {
    move_uploaded_file($_FILES["image_link"]["tmp_name"], $target_file);

    $_SESSION['msg'] = "Product Updated!";
    header('Location: http://localhost/freshshop/products.php');
    exit;

  } else {

    $_SESSION['msg'] = "Product Update failed!";
    header('Location: http://localhost/freshshop/products.php');
    exit;
    
	}
}

?>