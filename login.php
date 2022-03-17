<?php
session_start();
ob_start();
?>

<?php
if (isset($_SESSION['login'])) {
  header('Location: http://localhost/freshshop/panel.php');
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
  <title>Login</title>
  <?php include 'admin-csslink.php'; ?>
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('images/login.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <?php include 'alert.php'; ?>
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                </div>
              </div>

              <div class="card-body">
                <form role="form" class="text-start" method="post" action="admin/login-logic.php">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($_COOKIE['loginUserCookie'])) { echo $_COOKIE['loginUserCookie']; } ?>">
                    <div class="valid-feedback" id="userchk">Look Good</div>
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_COOKIE['loginPassCookie'])) { echo $_COOKIE['loginPassCookie']; } ?>">
                    <div class="valid-feedback" id="passchk">Look Good</div>
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" <?php if (isset($_COOKIE['loginUserCookie'])) { echo "checked"; } ?>>
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="login" id="login">Sign in</button>
                  </div>

                  <p class="mt-4 text-sm text-center">Don't have an account?<a href="signup.php" class="text-primary text-gradient font-weight-bold">Sign up</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer position-absolute bottom-2 py-2 w-100">
  <div class="container">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-12 col-md-6 my-auto">
        <div class="copyright text-center text-sm text-white text-lg-start">All Rights Reserved. &copy; <?php echo date('Y'); ?> || Developed By : <a href="https://devspecial.online/" class="text-success">Pawan</a></div>
      </div>

      <div class="col-12 col-md-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="about.php" class="nav-link text-white" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="shop.php" class="nav-link text-white" target="_blank">Shop</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</div>
</main>

<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin/assets/js/core/popper.min.js"></script>
<script src="admin/assets/js/core/bootstrap.min.js"></script>
<script src="admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="admin/assets/js/material-dashboard.min.js?v=3.0.1"></script>

<script>
$(document).ready(function() {
  var user_err = true;
  var pass_err = true;

  // Hide Error msg box
  $('#userchk').hide();
  $('#passchk').hide();

  $('#username').keyup(function() {
    username_check();
  });

  function username_check() {
    var usernameValue = $('#username').val();
    
    if (usernameValue.length == '') {
      $('#userchk').show();
      $('#userchk').html("Fill the Username!");
      $('#userchk').focus();
      $('#userchk').css("color", "red");
      user_err = false;
      return false;
    } else {
      $('#userchk').hide();
    }

    // Checking for Username Length
    if (usernameValue.length < 3 || usernameValue.length > 10) {
      $('#userchk').show();
      $('#userchk').html("Username must be between 3 and 10 character!");
      $('#userchk').focus();
      $('#userchk').css("color", "red");
      user_err = false;
      return false;
    } else {
      $('#userchk').hide();
    }
  }

  //========================================
  $('#password').keyup(function() {
    password_check();
  });

  function password_check() {
    var passwordValue = $('#password').val();

    if (passwordValue.length == '') {
      $('#passchk').show();
      $('#passchk').html("Fill the Password!");
      $('#passchk').focus();
      $('#passchk').css("color", "red");
      pass_err = false;
      return false;
    } else {
      $('#passchk').hide();
    }

    if (passwordValue.length < 3 || passwordValue.length > 10) {
      $('#passchk').show();
      $('#passchk').html("Password must be b/w 3 and 10 character!");
      $('#passchk').focus();
      $('#passchk').css("color", "red");
      pass_err = false;
      return false;
    } else {
      $('#passchk').hide();
    }
  }

  //========================================
  // For Submit Button
  $('#login').click(function() {
    user_err = true;
    pass_err = true;

    username_check();
    password_check();

    if (user_err == true && pass_err == true) {
      return true;
    } else {
      return false;
    }
  });
});
</script>

</body>

</html>