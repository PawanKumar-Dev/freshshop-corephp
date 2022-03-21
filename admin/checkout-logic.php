<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_POST['checkout'])) {

  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $subtotal = $_POST['subtotal'];
  $grandtotal = $_POST['grandtotal'];

  // echo $product_name."<br>";
  // echo $price."<br>";
  // echo $qty."<br>";
  // echo $subtotal."<br>";
  // echo $grandtotal."<br>";

  $cart = [
    'product_name' => $product_name,
    'price' => $price,
    'qty' =>  $qty,
    'subtotal' => $subtotal,
    'grandtotal' => $grandtotal
  ];

  $_SESSION['cart'] = $cart;

  header('Location: http://localhost/freshshop/checkout.php');
  exit;
}


?>