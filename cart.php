<?php
session_start();
ob_start();

if (!isset($_GET['pro_id'])) {
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
          <li class="breadcrumb-item"><a href="#">Shop</a></li>
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
                <?php
                if (isset($_GET['pro_id'])) :
                  $proid = $_GET['pro_id'];
                  $sql = "select * from products where id = $proid";

                  $result = mysqli_query($connection, $sql);
                  if (mysqli_num_rows($result) > 0) :
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                      <tr>
                        <td class="thumbnail-img">
                          <a href="#">
                            <img class="img-fluid" src="images/<?= $row['image_link']; ?>">
                          </a>
                        </td>

                        <td class="name-pr">
                          <a href="shop-detail.php?<?= $row['id']; ?>">
                            <?= $row['product_name']; ?>
                            <input type="hidden" name="product_name" value="<?= $row['product_name']; ?>">
                          </a>
                        </td>

                        <td class="price-pr">
                          <p>$ <?= $row['price']; ?></p>
                          <input type="hidden" name="price" id="price" value="<?= $row['price']; ?>">
                        </td>

                        <td class="quantity-box">
                          <input type="number" value="1" min="0" class="c-input-text qty text" name="qty" id="qty" onchange="calculateSubTotal(this.value);">
                        </td>

                        <td class="total-pr">
                          <p>$ <span id="subtotal"><?= $row['price']; ?></span></p>
                          <input type="hidden" id="subtotal2" name="subtotal" value="<?= $row['price']; ?>">
                        </td>

                        <td class="remove-pr">
                          <a href="#">
                            <i class="fas fa-times"></i>
                          </a>
                        </td>
                      </tr>
                <?php
                    endwhile;
                  endif;
                endif;
                ?>
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

          <?php
          if (isset($_GET['pro_id'])) :
            $sql = "select price from products where id = $proid";

            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) :
              while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="d-flex">
                  <h4>Shipping Cost</h4>
                  <div class="ml-auto font-weight-bold"> Free </div>
                </div>
                <hr>
                <div class="d-flex gr-total">
                  <h5>Grand Total</h5>
                  <div class="ml-auto h5"> $ <span id="grandtotal"><?= $row['price']; ?></span>
                  <input type="hidden" name="grandtotal" id="grandtotal2" value="<?= $row['price']; ?>">
                  </div>
                </div>
          <?php
              endwhile;
            endif;
          endif;
          ?>
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