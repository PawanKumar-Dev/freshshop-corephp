<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_POST['add_product'])) {

  $product_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $stock = $_POST['stock'];
  $user_id = $_POST['user_id'];

  $image_link = $_FILES["image_link"]["name"];


  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["image_link"]["name"]);

  $sql = "insert into products (product_name, description, category, price, stock, image_link, user_id) values('$product_name', '$description',  '$category', '$price', '$stock', '$image_link', '$user_id')";
  
  if (mysqli_query($connection, $sql)) {

	  move_uploaded_file($_FILES["image_link"]["tmp_name"], $target_file);

    $_SESSION['msg'] = "Product Added!";
    header('Location: http://localhost/freshshop/products.php');
    exit;
  } else {
  
    $_SESSION['msg'] = "Product Not Added!";
    header('Location: http://localhost/freshshop/products.php');
    exit;
  }
}


?>