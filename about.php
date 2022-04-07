<?php include_once 'header.php'; ?>

<!-- Start All Title Box -->
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>ABOUT US</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">ABOUT US</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">
  <div class="container">
  <?php
    $sql = "select * from aboutpage";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) :
      while ($record = mysqli_fetch_assoc($result)) : ?>

    <div class="row">
      <div class="col-lg-6">
        <div class="banner-frame"> <img class="img-fluid" src="upload/<?php echo $record['main_img']; ?>">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="noo-sh-title-top">We are <span>Freshshop</span></h2>
        <p><?php echo $record['main_text']; ?></p>
      </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
    <div class="row my-5">
      <div class="col-sm-6 col-lg-4">
        <div class="service-block-inner">
          <h3>We are Trusted</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="service-block-inner">
          <h3>We are Professional</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="service-block-inner">
          <h3>We are Expert</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- End About Page -->

<?php include_once 'footer.php'; ?>