<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <?php include('partials/link.php'); ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="public/assets/wdLogo.jpg" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <form class="pt-3"action="login_process.php" method="POST"> 
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"  name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <a href="emp/login.php" class="auth-link text-black">BWD-EMP</a>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                    <div class="mt-3 d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" name="submit_login">
                            SIGN IN
                        </button>
                    </div>
                  <div class="text-center mt-4 fw-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php include('partials/footer.php'); ?>
  </body>
</html>