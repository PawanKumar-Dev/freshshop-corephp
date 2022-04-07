<?php 
session_start();
ob_start();

require_once 'connect.php';

if (isset($_POST['update'])) {
  
  $pro_id = $_POST['pro_id'];

  $_SESSION['cart'][$pro_id]['qty'] = $_POST['qty'];
  header('Location: http://localhost/freshshop/cart.php');
}