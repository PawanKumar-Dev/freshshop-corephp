<?php
if (!isset($_GET['id'])) {
  header('Location: http://localhost/freshshop/shop.php');
}
?>
<?php include_once 'header.php'; ?>

<!-- Start All Title Box -->
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Shop Detail</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
          <li class="breadcrumb-item active">Shop Detail </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
  <div class="container">
    <div class="row">
      <?php
      $id = $_GET['id'];
      $sql = "select * from products where id = $id";
      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) :
        while ($record = mysqli_fetch_assoc($result)) : ?>

          <div class="col-xl-5 col-lg-5 col-md-6">
            <img src="upload/<?php echo $record['image_link']; ?>" class="img-fluid" alt="Image">
          </div>
          <div class="col-xl-7 col-lg-7 col-md-6">
            <div class="single-product-details">
              <h2><?php echo $record['product_name']; ?></h2>
              <h5>Price: $<?php echo $record['price']; ?></h5>
              <p class="available-stock"><span> More than <?php echo $record['stock']; ?> available<p>
              <h4>Short Description:</h4>
              <p><?php echo $record['description']; ?></p>

              <div class="price-box-bar">
                <div class="cart-and-bay-btn">
                  <a class="btn hvr-hover" href="admin/add_to_cart.php?pro_id=<?php echo $record['id']; ?>">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>

    <div class="row my-5">
      <?php include_once 'shop-reviews.php'; ?>
    </div>

  </div>
</div>
<!-- End Cart -->

<?php include_once 'footer.php'; ?>