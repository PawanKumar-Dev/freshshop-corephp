<?php
session_start();
ob_start();

if (!isset($_SESSION['cart'])) {
  header('Location: http://localhost/freshshop/shop.php');
}
?>
<?php include 'header.php'; ?>

<!-- Start All Title Box -->
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Cart</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
          <li class="breadcrumb-item active">Cart</li>
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
      <div class="col-lg-12">
        <div class="table-main table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Images</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Remove</th>
              </tr>
            </thead>

            <tbody>
              <form action="admin/checkout-logic.php" method="post">
                <tr>
                  <td class="thumbnail-img">
                    <a href="#">
                      <img class="img-fluid" src="images/<?= $_SESSION['cart']['image_link']; ?>">
                    </a>
                  </td>

                  <td class="name-pr">
                    <a href="shop-detail.php?<?= $_SESSION['cart']['pro_id']; ?>">
                      <?= $_SESSION['cart']['product_name']; ?>
                      <input type="hidden" name="product_name" value="<?= $_SESSION['cart']['product_name']; ?>">
                    </a>
                  </td>

                  <td class="price-pr">
                    <p>$ <?= $_SESSION['cart']['price']; ?></p>
                    <input type="hidden" name="price" id="price" value="<?= $_SESSION['cart']['price']; ?>">
                  </td>

                  <td class="quantity-box">
                    <input type="number" value="1" min="1" class="c-input-text qty text" name="qty" id="qty" onchange="calculateSubTotal(this.value);">
                  </td>

                  <td class="total-pr">
                    <p>$ <span id="subtotal"><?= $_SESSION['cart']['price']; ?></span></p>
                    <input type="hidden" id="subtotal2" name="subtotal" value="<?= $_SESSION['cart']['price']; ?>">
                  </td>

                  <td class="remove-pr">
                    <a href="#">
                      <i class="fas fa-times"></i>
                    </a>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Will insert Coupon here -->

    <div class="row my-5">
      <div class="col-lg-8 col-sm-12"></div>
      <div class="col-lg-4 col-sm-12">
        <div class="order-box">
          <h3>Order summary</h3>
          <div class="d-flex">
            <h4>Shipping Cost</h4>
            <div class="ml-auto font-weight-bold"> Free </div>
          </div>
          <hr>
          <div class="d-flex gr-total">
            <h5>Grand Total</h5>
            <div class="ml-auto h5"> $ <span id="grandtotal"><?= $_SESSION['cart']['price']; ?></span>
              <input type="hidden" name="grandtotal" id="grandtotal2" value="<?= $_SESSION['cart']['price']; ?>">
            </div>
          </div>
          <hr>
        </div>
      </div>
      <div class="col-12 d-flex shopping-box"><input type="submit" class="ml-auto btn hvr-hover" name="checkout" value="Checkout"></div>
      </form>
    </div>

  </div>
</div>
<!-- End Cart -->

<?php include 'instagram-feed.php'; ?>

<?php include 'footer.php'; ?>
<script>
  function calculateSubTotal(qty) {
    var price = $('#price').val();

    var subtotal = qty * price;
    $('#subtotal').html(subtotal);
    $('#subtotal2').val(subtotal);
    $('#grandtotal').html(subtotal);
    $('#grandtotal2').val(subtotal);
  }
</script>