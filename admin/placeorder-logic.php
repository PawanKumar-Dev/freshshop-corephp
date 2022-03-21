<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_POST['placeorder'])) {

  $product_name = $_SESSION['cart']['product_name'];
  $price = $_SESSION['cart']['price'];
  $qty = $_SESSION['cart']['qty'];
  $subtotal = $_SESSION['cart']['subtotal'];
  $grandtotal = $_SESSION['cart']['grandtotal'];

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  $sql = "insert into orders (product_name, price, qty, subtotal, grandtotal) values('$product_name', '$price',  '$qty', '$subtotal', '$grandtotal')";

  $sql2 = "insert into customers (fullname, email, address) values('$fullname', '$email',  '$address')";
  
  if (mysqli_query($connection, $sql) && mysqli_query($connection, $sql2)) {
    unset($_SESSION['cart']);

    header('Location: http://localhost/freshshop/index.php');
    exit;
  }

}
?>