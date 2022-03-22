<?php 
session_start();
ob_start();

require 'connect.php';

if (isset($_GET['pro_id'])) {

  $pro_id = $_GET['pro_id'];
  $sql = "select * from products where id = $pro_id";

  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      $image_link = $row['image_link'];
      $product_name = $row['product_name'];
      $price = $row['price'];

      $cart = [
        'product_name' => $product_name,
        'price' => $price,
        'pro_id' =>  $pro_id,
        'image_link' => $image_link
      ];
    
      $_SESSION['cart'] = $cart;
    }   
  }

  header('Location: http://localhost/freshshop/cart.php');
  exit;
}

?>