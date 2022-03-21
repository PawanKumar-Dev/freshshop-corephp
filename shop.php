<?php include 'header.php'; ?>



<!-- Start All Title Box -->
<div class="all-title-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Shop</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Shop</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
        <div class="right-product-box">
          <div class="product-item-filter row">
            <div class="col-12 col-sm-8 text-center text-sm-left">
              <div class="toolbar-sorter-right">
                <span>Sort by </span>
                <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                  <option data-display="Select">Nothing</option>
                  <option value="1">Popularity</option>
                  <option value="2">High Price → High Price</option>
                  <option value="3">Low Price → High Price</option>
                  <option value="4">Best Selling</option>
                </select>
              </div>
              <p>Showing all results</p>
            </div>
          </div>

          <div class="product-categorie-box">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                <div class="row">

                  <?php
                  $sql = "select * from products";
                  $result = mysqli_query($connection, $sql);

                  if (mysqli_num_rows($result) > 0) :
                    while ($record = mysqli_fetch_assoc($result)) : ?>

                      <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
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
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
        <div class="product-categori">
          <div class="search-product">
            <form action="#">
              <input class="form-control" placeholder="Search here..." type="text">
              <button type="submit"> <i class="fa fa-search"></i> </button>
            </form>
          </div>
          <div class="filter-sidebar-left">
            <div class="title-left">
              <h3>Categories</h3>
            </div>
            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
              <div class="list-group-collapse sub-men">
                <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Fruits & Drinks <small class="text-muted">(100)</small>
                </a>
                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Fruits 1 <small class="text-muted">(50)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Fruits 2 <small class="text-muted">(10)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Fruits 3 <small class="text-muted">(10)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Fruits 4 <small class="text-muted">(10)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Fruits 5 <small class="text-muted">(20)</small></a>
                  </div>
                </div>
              </div>
              <div class="list-group-collapse sub-men">
                <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Vegetables
                  <small class="text-muted">(50)</small>
                </a>
                <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Vegetables 1 <small class="text-muted">(10)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Vegetables 2 <small class="text-muted">(20)</small></a>
                    <a href="#" class="list-group-item list-group-item-action">Vegetables 3 <small class="text-muted">(20)</small></a>
                  </div>
                </div>
              </div>
              <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(150) </small></a>
              <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(11)</small></a>
              <a href="#" class="list-group-item list-group-item-action"> Grocery <small class="text-muted">(22)</small></a>
            </div>
          </div>
          <div class="filter-price-left">
            <div class="title-left">
              <h3>Price</h3>
            </div>
            <div class="price-box-slider">
              <div id="slider-range"></div>
              <p>
                <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                <button class="btn hvr-hover" type="submit">Filter</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Shop Page -->

<?php include 'instagram-feed.php'; ?>

<?php include 'footer.php'; ?>