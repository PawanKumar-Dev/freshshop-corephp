<?php include 'admin/connect.php'; ?>

<!-- Start Products  -->
<div class="products-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Fruits & Vegetables</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="special-menu text-center">
          <div class="button-group filter-button-group">
            <button class="active" data-filter="*">All</button>
            <button data-filter=".best-seller">Best seller</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row special-list">

    <?php
      $sql = "select * from products limit 4";
      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) :
        while ($record = mysqli_fetch_assoc($result)) : ?>

      <div class="col-lg-3 col-md-6 special-grid best-seller">
        <div class="products-single fix">
          <div class="box-img-hover">
            <div class="type-lb">
              <p class="sale">Sale</p>
            </div>
            <img src="upload/<?php echo $record['image_link']; ?>" class="img-fluid" alt="Image">
            <div class="mask-icon">
              <ul>
                <li><a href="shop-detail.php?id=<?php echo $record['id']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                <li><a href="wishlist.php?id=<?php echo $record['id']; ?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
              </ul>
              <a class="cart" href="cart.php?id=<?php echo $record['id']; ?>">Add to Cart</a>
            </div>
          </div>
          <div class="why-text">
            <h4><?php echo $record['product_name']; ?></h4>
            <h5> $<?php echo $record['price']; ?></h5>
          </div>
        </div>
      </div>

      <?php
        endwhile;
      endif;
      ?>
    </div>
  </div>
</div>
<!-- End Products  -->