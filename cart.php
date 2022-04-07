<?php include_once 'admin/connect.php'; ?>

<?php include_once 'header.php'; ?>

    <?php include_once 'search-nav.php'; ?>

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
                <th>Update</th>
                <th>Remove</th>
              </tr>
            </thead>

            <tbody>
                <?php $grandtotal = 0;?>
                <?php foreach ($_SESSION['cart'] as $cart): ?>
                <?php $subtotal =  $cart['price'] * $cart['qty']; ?>
                <tr>
                  <td class="thumbnail-img">
                    <a href="#">
                      <img class="img-fluid" src="images/<?= $cart['image_link']; ?>">
                    </a>
                  </td>

                  <td class="name-pr">
                    <a href="shop-detail.php?<?= $cart['pro_id']; ?>">
                      <?= $cart['product_name']; ?>
                      
                    </a>
                  </td>

                  <td class="price-pr">
                    <p>$ <?= $cart['price']; ?></p>
                    <input type="hidden" name="price" id="price" value="<?= $cart['price']; ?>">
                  </td>

                  <td class="quantity-box">
                    <form action="admin/update_cart.php" method="post">
                      <input type="number" value="<?= $cart['qty']; ?>" min="1" class="c-input-text qty text" name="qty">
                  </td>

                  <td class="total-pr">
                    <p>$ <span><?= $subtotal ?></span></p>
                    <input type="hidden" name="subtotal" value="<?= $subtotal; ?>">
                  </td>

                  <td class="remove-pr">
                      <input type="hidden" name="pro_id" value="<?= $cart['pro_id']; ?>">
                      <input type="submit" name="update" value="Update" class="btn btn-sm btn-success">
                    </form>
                  </td>

                  <td class="remove-pr">
                    <a href="admin/remove_cart.php?pro_id=<?= $cart['pro_id']; ?>" class="btn btn-sm btn-danger">Remove</a>
                  </td>
                </tr>
                <?php $grandtotal +=  $subtotal; ?>
                <?php endforeach;?>
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
            <div class="ml-auto h5">
              $ <span id="grandtotal"><?= $grandtotal;?></span>
            </div>
          </div>
          <hr>
        </div>
      </div>

      <div class="col-12 d-flex shopping-box">
        <a class="ml-auto btn hvr-hover green-color" href="">Checkout</a>
      </div>
      
    </div>

  </div>
</div>
<!-- End Cart -->

<?php include_once 'footer.php'; ?>