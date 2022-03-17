<?php
session_start();
ob_start();
include 'admin/connect.php';

if (!isset($_SESSION['login'])) {
  header('Location: http://localhost/freshshop/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Pawan">
  <meta name="robots" content="noindex">

  <?php include 'favicon.php'; ?>
  <title>Contact Page</title>
  <?php include 'admin-csslink.php'; ?>
</head>

<body class="g-sidenav-show bg-gray-200">

  <?php include 'admin-sidenav.php'; ?>

  <div class="main-content position-relative max-height-vh-100 h-100">

    <?php include 'admin-topbar.php'; ?>

    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('images/profile.jpg');">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>

      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="admin/assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">Edit Your Contact Info</h5>
              <p class="mb-0 font-weight-normal text-sm">Admin</p>
            </div>
          </div>
        </div>
      </div>

      <?php include 'alert.php'; ?>

      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Current Contact Info</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <form role="form" action="admin/contactus-update.php" method="post" autocomplete="off">
                
              <?php 
                $sql = "select * from contactpage";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0):
                  while($record = mysqli_fetch_assoc($result)): ?>

                <div>Contact Info</div>
                <div class="input-group input-group-outline mb-3">
                  <textarea class="form-control" name="info" id="info" cols="30" rows="5" required><?php echo $record['info']; ?></textarea>
                </div>
                
                <div>Address</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="text" class="form-control" name="address" required value="<?php echo $record['address']; ?>">
                </div>

                <div>Phone</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="tel" class="form-control" name="phone" required value="<?php echo $record['phone']; ?>">
                </div>

                <div>Email</div>
                <div class="input-group input-group-outline mb-3">
                  <input type="email" class="form-control" name="email" required value="<?php echo $record['email']; ?>">
                </div>

                <input type="hidden" name="up_id" value="<?php echo $record['id']; ?>">

                <?php
                    endwhile;
                  endif;
                ?>

                <div class="text-center">
                  <button type="submit" name="update" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'adminpanel_copyright.php'; ?>
  </div>

  <?php include 'admin-footer.php'; ?>