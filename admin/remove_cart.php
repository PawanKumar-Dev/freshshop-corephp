<?php 
session_start();
ob_start();

require_once 'connect.php';

if (isset($_GET['pro_id'])) {
  $pro_id = $_GET['pro_id'];

  unset($_SESSION['cart'][$pro_id]);

  header('Location: http://localhost/freshshop/cart.php');
  exit;
}

?>