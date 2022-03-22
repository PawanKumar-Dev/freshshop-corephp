<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_GET['pro_id'])) {

  unset($_SESSION['cart']);

  header('Location: http://localhost/freshshop/shop.php');
  exit;
}

?>