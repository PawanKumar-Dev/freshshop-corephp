<?php
session_start();
ob_start();
include 'admin/connect.php';

$edit_id = $_GET['edit_id'];

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
  <title>Add Product</title>
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
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Add Product</h6>
              </div>
            </div>

            <div class="card-body px-3 pb-2">
              <form role="form" action="admin/update_product.php" method="post" enctype="multipart/form-data">
              
              <?php
                $sql = "select * from products where id = $edit_id";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) :
                  while ($record = mysqli_fetch_assoc($result)) : ?>

                <div>Product Name</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="text" class="form-control" name="product_name" value="<?php echo $record['product_name']; ?>" required>
                </div>

                <div>Description</div>
                <div class="input-group input-group-outline mb-3">
                  <textarea class="form-control" name="description" cols="30" rows="5" required><?php echo $record['description']; ?></textarea>
                </div>

                <div>Category</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="text" class="form-control" name="category" value="<?php echo $record['category']; ?>" required>
                </div>

                <div>Price</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="number" class="form-control" name="price" value="<?php echo $record['price']; ?>" required>
                </div>

                <div>Stock</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="number" class="form-control" name="stock" value="<?php echo $record['stock']; ?>" required>
                </div>

                <div>Image Upload (Size: 370px by 350px)</div>
                <img src="upload/<?php echo $record['image_link']; ?>" class="avatar me-2" height="90">
                <div class="input-group input-group-outline mb-3">
                  <input type="file" class="form-control" name="image_link" required>
                </div>

                <input type="hidden" name="up_id" value="<?php echo $record['id']; ?>">
                
                <?php
                  endwhile;
                endif;
                ?>

                <div class="text-center">
                  <button type="submit" name="update_product" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update Product</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php include 'adminpanel_copyright.php'; ?>
    </div>
  </main>

  <?php include 'admin-footer.php'; ?>