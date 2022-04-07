<?php 
session_start();
ob_start();

require_once 'connect.php';

if (isset($_POST['placeorder'])) {

  $product_name = $_SESSION['cartupdate']['product_name'];
  $price = $_SESSION['cartupdate']['price'];
  $qty = $_SESSION['cartupdate']['qty'];
  $subtotal = $_SESSION['cartupdate']['subtotal'];
  $grandtotal = $_SESSION['cartupdate']['grandtotal'];

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