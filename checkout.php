<?php include_once 'header.php'; ?>

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
            <div class="order-box">
              <div class="title-left">
                <h3>Your order</h3>
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

          <div class="col-12 d-flex shopping-box">
            <form action="checkout.php" method="post">
              <input type="hidden" name="">
              <input type="submit" class="ml-auto btn hvr-hover" name="placeorder" value="Place Order">
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- End Cart -->

<?php include_once 'footer.php'; ?>