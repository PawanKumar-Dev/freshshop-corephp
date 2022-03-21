<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_POST['checkout'])) {

  unset($_SESSION['cart']);

  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $subtotal = $_POST['subtotal'];
  $grandtotal = $_POST['grandtotal'];

  $cartUpdate = [
    'product_name' => $product_name,
    'price' => $price,
    'qty' =>  $qty,
    'subtotal' => $subtotal,
    'grandtotal' => $grandtotal
  ];

  $_SESSION['cartupdate'] = $cartUpdate;

  header('Location: http://localhost/freshshop/checkout.php');
  exit;
}


?>