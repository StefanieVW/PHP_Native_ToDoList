<?php
include "app/Config/database.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="resources/assets/css/style.css">
  <link rel="stylesheet" href="resources/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-2 m-1 text-center">
            <img src="resources/images/lock.svg" alt="logo" width="180" class="mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Please <span class="font-weight-bold">Login</span></h4>
            <form action="app/Controllers/login.php" method="POST" class="needs-validation">
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" class="form-control" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input name="password" id="password" type="password" class="form-control" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <div class="form-group text-right">
                <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="resources/views/register.php">Create new one</a>
              </div>
            </form>
          </div>
        </div>
        <div
          class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
          data-background="resources/images/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Have You Nice Day</h1>
                <h5 class="font-weight-normal text-muted-transparent">Wonderful, Indonesia</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="resources/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="resources/assets/js/scripts.js"></script>
  <script src="resources/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>