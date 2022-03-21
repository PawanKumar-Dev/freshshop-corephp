<?php
session_start();
ob_start();

if (isset($_SESSION['login'])) {
  header('Location: http://localhost/freshshop/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include 'favicon.php'; ?>
  <title>Sign Up</title>
  <?php include 'admin-csslink.php'; ?>
</head>

<body class="bg-gray-200">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100" style="background-image: url('images/login.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-auto me-auto ms-lg-auto">
              <div class="card card-plain" style="background-color: white;">
                <div class="card-header text-center">
                  <?php include 'alert.php'; ?>
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                
                <div class="card-body">
                  <form role="form" action="admin/signup-logic.php" method="post" autocomplete="off">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username">
                      <div class="valid-feedback" id="userchk">Look Good</div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name">
                      <div class="valid-feedback" id="namechk">Look Good</div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email">
                      <div class="valid-feedback" id="emailchk">Look Good</div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <div class="valid-feedback" id="passchk">Look Good</div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmpwd" name="confirmpwd">
                      <div class="valid-feedback" id="cpasschk">Look Good</div>
                    </div>

                    <div class="text-center">
                      <button type="submit" id="sbmt" name ="signup" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>

                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">Already have an account? <a href="login.php" class="text-primary text-gradient font-weight-bold">Sign in</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 
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
  $(document).ready(function(){

  var user_err = true;
  var email_err = true;
  var pass_err = true;
  var cpass_err = true;
  var name_err = true;

  // Hide Error msg box
  $('#userchk').hide();
  $('#emailchk').hide();
  $('#namechk').hide();
  $('#passchk').hide();
  $('#cpasschk').hide();

  //========================================
  // Firing Event on Key up. Calling checking function
  $('#username').keyup(function() {
    username_check();
  });

  // Function for Checking Username
  function username_check() {
    // Getting value from input
    var usernameValue = $('#username').val();
    
    // Checking for empty field
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
  $('#name').keyup(function() {
    name_check();
  });

  function name_check() {
    var nameValue = $('#name').val();
    
    if (nameValue.length == '') {
      $('#namechk').show();
      $('#namechk').html("Fill the Name!");
      $('#namechk').focus();
      $('#namechk').css("color", "red");
      name_err = false;
      return false;
    } else {
      $('#namechk').hide();
    }

    if (nameValue.length < 3 || nameValue.length > 10) {
      $('#namechk').show();
      $('#namechk').html("Name must be between 3 and 10 character!");
      $('#namechk').focus();
      $('#namechk').css("color", "red");
      name_err = false;
      return false;
    } else {
      $('#namechk').hide();
    }
  }

  //========================================
  // Function to regex test email
  function ValidateEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
  };

  $('#email').keyup(function() {
    email_check();
  });


  function email_check() {
    var emailValue = $('#email').val();

    if (emailValue.length == '') {
      $('#emailchk').show();
      $('#emailchk').html("Fill the Email!");
      $('#emailchk').focus();
      $('#emailchk').css("color", "red");
      email_err = false;
      return false;
    } else {
      $('#emailchk').hide();
    }

    if (!(ValidateEmail(emailValue))) {
      $('#emailchk').show();
      $('#emailchk').html("Email is not valid!");
      $('#emailchk').focus();
      $('#emailchk').css("color", "red");
      email_err = false;
      return false;
    } else {
      $('#emailchk').hide();
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
  $('#confirmpwd').keyup(function() {
    confirmpass_check();
  });

  function confirmpass_check() {
    var passwordValue = $('#password').val();
    var confpassValue = $('#confirmpwd').val();

    if (passwordValue !== confpassValue) {
      $('#cpasschk').show();
      $('#cpasschk').html("Confirm Password is not matched!");
      $('#cpasschk').focus();
      $('#cpasschk').css("color", "red");
      cpass_err = false;
      return false;
    } else {
      $('#cpasschk').hide();
    }
  }

  //========================================
  // For Submit Button
  $('#sbmt').click(function() {
    user_err = true;
    name_err = true;
    email_err =true;
    pass_err = true;
    cpass_err = true;

    username_check();
    email_check();
    name_check();
    password_check();
    confirmpass_check();

    if (user_err == true && name_err == true && email_err && pass_err == true && cpass_err == true) {
      return true;
    } else {
      return false;
    }
  });
});

</script>
</body>

</html>