<?php
session_start();
ob_start();
include 'admin/connect.php';

if (!isset($_SESSION['login'])) {
  header('Location: http://localhost/freshshop/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Pawan">
  <meta name="robots" content="noindex">

  <?php include 'favicon.php'; ?>
  <title>Products</title>
  <?php include 'admin-csslink.php'; ?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php include 'admin-sidenav.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include 'admin-topbar.php'; ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <?php include 'alert.php'; ?>
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Products</h6>
                <a href="add_product.php" class="btn btn-sm btn-success float-end">Add Product</a>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0 text-center">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ">Product Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Catgory</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Stock</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2" colspan="2">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php 
                    $sql = "select * from products";
                    $result = mysqli_query($connection, $sql);

                    if (mysqli_num_rows($result) > 0):
                      while($record = mysqli_fetch_assoc($result)): ?>

                    <tr>
                      <td>
                      <p class="text-sm font-weight-bold mb-0 text-center"><?php echo $record['product_name']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $record['description']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $record['category']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">$<?php echo $record['price']; ?></p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo $record['stock']; ?></p>
                      </td>
                      <td>
                        <img src="upload/<?php echo $record['image_link']; ?>" class="avatar avatar-sm rounded-circle me-2" height="90">
                      </td>
                      <td>
                        <a href="edit_product.php?id=<?php echo $record['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      </td>
                      <td>
                      <a href="delete_product.php?id=<?php echo $record['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>

                    <?php
                        endwhile;
                      endif;
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include 'adminpanel_copyright.php'; ?>
    </div>
  </main>

  <?php include 'admin-footer.php'; ?>