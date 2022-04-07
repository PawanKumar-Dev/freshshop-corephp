<?php
session_start();
ob_start();

require_once 'connect.php';

if (isset($_GET['pro_id'])) {
  $pro_id = $_GET['pro_id'];
  $item = [];

  // If cart is completely empty
  // we insert the item in cart session
  if (empty($_SESSION['cart'])) {
    $sql = "select * from products where id = $pro_id";
    $result = mysqli_query($connection, $sql);

    // Getting all item info and storing it into an array.
    if (mysqli_num_rows($result) > 0) {
      while ($record = mysqli_fetch_assoc($result)) {
        $item['pro_id'] = $record['id'];
        $item['product_name'] = $record['product_name'];
        $item['description'] = $record['description'];
        $item['category'] = $record['category'];
        $item['price'] = $record['price'];
        $item['qty'] = 1;
        $item['stock'] = $record['stock'];
        $item['image_link'] = $record['image_link'];
      }
    }

    // Storing our item array into cart session
    $_SESSION['cart'][$pro_id] = $item;

    header('Location: http://localhost/freshshop/cart.php');
  } else {
    // Getting product id of existing item in cart array
    $existingProid = array_column($_SESSION['cart'], 'pro_id');

    // Checking if our added product already exist in cart session
    if (in_array($pro_id, $existingProid)) {
      
      // When item already exist we just increase qty or qty of item by 1
      $_SESSION['cart'][$pro_id]['qty'] += 1;

      header('Location: http://localhost/freshshop/cart.php');

    } else {

      // If item doesn't exist in cart session we insert it
      $sql = "select * from products where id = $pro_id";
      $result = mysqli_query($connection, $sql);

      // Getting all item info and storing it into an array.
      if (mysqli_num_rows($result) > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
          $item['pro_id'] = $record['id'];
          $item['product_name'] = $record['product_name'];
          $item['description'] = $record['description'];
          $item['category'] = $record['category'];
          $item['price'] = $record['price'];
          $item['qty'] = 1;
          $item['stock'] = $record['stock'];
          $item['image_link'] = $record['image_link'];
        }
      }

      // Storing our item array into cart session
      $_SESSION['cart'][$pro_id] = $item;

      header('Location: http://localhost/freshshop/cart.php');
    }
  }
}
