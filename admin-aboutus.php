<?php
session_start();
ob_start();
include_once 'admin/connect.php';

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

  <?php include_once 'favicon.php'; ?>
  <title>About Us Page</title>
  <?php include_once 'admin-csslink.php'; ?>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <?php include_once 'admin-sidenav.php'; ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include_once 'admin-topbar.php'; ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <?php include_once 'alert.php'; ?>

            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Edit About Page</h6>
              </div>
            </div>

            <div class="card-body px-3 pb-2">
              <form role="form" action="admin/aboutus-update.php" method="post" enctype="multipart/form-data">

                <?php
                $sql = "select * from aboutpage";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) :
                  while ($record = mysqli_fetch_assoc($result)) : ?>

                    <div>Main About Text</div>
                    <div class="input-group input-group-outline mb-3">
                      <textarea class="form-control" name="main_text" cols="30" rows="10" required><?php echo $record['main_text']; ?></textarea>
                    </div>

                    <div>Main About Image(Size: 800px by 700px)</div>
                    <div class="input-group input-group-outline mb-3">
                      <img src="upload/<?php echo $record['main_img']; ?>" height="100px">
                      <input type="file" class="form-control" name="main_img" required>
                    </div>

                    <input type="hidden" name="up_id" value="<?php echo $record['id']; ?>">

                <?php
                  endwhile;
                endif;
                ?>

                <div class="text-center">
                  <button type="submit" name="aboutupdate" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <?php include_once 'adminpanel_copyright.php'; ?>
    </div>
  </main>

  <?php include_once 'admin-footer.php'; ?>