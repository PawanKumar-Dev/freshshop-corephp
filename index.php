<?php include 'header.php'; ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
  <ul class="slides-container">
    <li class="text-center">
      <img src="images/banner-01.jpg" alt="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
          </div>
        </div>
      </div>
    </li>
    <li class="text-center">
      <img src="images/banner-02.jpg" alt="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
          </div>
        </div>
      </div>
    </li>
    <li class="text-center">
      <img src="images/banner-03.jpg" alt="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
          </div>
        </div>
      </div>
    </li>
  </ul>
  <div class="slides-navigation">
    <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
  </div>
</div>
<!-- End Slider -->

<?php include 'category-img.php'; ?>

<?php include 'offers-link.php'; ?>

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
              </ul>
              <a class="cart" href="admin/add_to_cart.php?pro_id=<?php echo $record['id']; ?>">Add to Cart</a>
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

<?php include 'footer.php'; ?>