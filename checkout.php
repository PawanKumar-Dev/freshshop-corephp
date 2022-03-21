<?php
session_start();
ob_start();

if (!isset($_SESSION['cartupdate'])) {
  header('Location: http://localhost/freshshop/index.php');
}
?>
<?php include 'header.php'; ?>

  <!-- Start All Title Box -->
  <div class="all-title-box">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Checkout</h2>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Shop</a></li>
            <li class="breadcrumb-item active">Checkout</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End All Title Box -->

  <!-- Start Cart  -->
  <div class="cart-box-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-6 mb-3">
          <div class="checkout-address">
            <div class="title-left">
              <h3>Billing address</h3>
            </div>

            <form action="admin/placeorder-logic.php" method="post">
              <div class="mb-3">
                <label for="username">Fullname *</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="fullname" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="email">Email Address *</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label for="address">Address *</label>
                <input type="text" class="form-control" name="address" required>
              </div>
              <div class="title">COD(Cash on Delivery)</div>       
          </div>
        </div>

        <div class="col-sm-6 col-lg-6 mb-3">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="odr-box">
                <div class="title-left">
                  <h3>Shopping cart</h3>
                </div>
                <div class="rounded p-2 bg-light">
                  <div class="media mb-2 border-bottom">
                    <div class="media-body"> Name: <?php echo $_SESSION['cartupdate']['product_name'] ?>
                      <div class="small text-muted">Price: $<?php echo $_SESSION['cartupdate']['price'] ?> <span class="mx-2">|</span> Qty: <?php echo $_SESSION['cartupdate']['qty'] ?> <span class="mx-2">|</span> Subtotal: $ <?php echo $_SESSION['cartupdate']['subtotal'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-12">
              <div class="order-box">
                <div class="title-left">
                  <h3>Your order</h3>
                </div>
                <div class="d-flex">
                  <div class="font-weight-bold">Product</div>
                  <div class="ml-auto font-weight-bold">Total</div>
                </div>
                <hr class="my-1">
                <div class="d-flex">
                  <h4>Sub Total</h4>
                  <div class="ml-auto font-weight-bold"> $ <?php echo $_SESSION['cartupdate']['subtotal'] ?></div>
                </div>
                <div class="d-flex">
                  <h4>Shipping Cost</h4>
                  <div class="ml-auto font-weight-bold"> Free </div>
                </div>
                <hr>
                <div class="d-flex gr-total">
                  <h5>Grand Total</h5>
                  <div class="ml-auto h5"> $ <?php echo $_SESSION['cartupdate']['grandtotal'] ?></div>
                </div>
                <hr>
              </div>
            </div>

            <div class="col-12 d-flex shopping-box"> <input type="submit" class="ml-auto btn hvr-hover" name="placeorder" value="Place Order"></div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End Cart -->

  <?php include 'instagram-feed.php'; ?>

  <?php include 'footer.php'; ?>