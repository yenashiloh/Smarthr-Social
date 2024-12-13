<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="icon" href="../public/assets/wdLogo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../public/assets-admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/assets-admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <style>
      .custom-select-wrapper {
      position: relative;
      }

      .custom-select-wrapper select {
          padding-right: 30px; 
      }

      .custom-select-wrapper i {
          position: absolute;
          top: 50%;
          right: 10px; 
          transform: translateY(-50%); 
          color: black; 
          font-size: 20px; 
          pointer-events: none; 
      }
    </style>
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../public/assets-admin/css/style.css">
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="../public/assets/wdLogo.jpg" alt="logo">
                </div>
                <h4>Emp Login</h4>
                <h6 class="fw-light">Sign in to continue.</h6>
                <form action="handlers/login_process.php" method="POST">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg"  name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                        <div class="custom-select-wrapper">
                            <select class="form-control form-control-lg"  name="role" id="role" required style="color:black;">
                                <option value="" selected disabled>Select Role</option>
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <i class="mdi mdi-chevron-down"></i>
                            </div>
                        </div>
                    <div class="mt-3 d-grid gap-2">
                        <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit" name="submit_login ">
                            SIGN IN
                        </button>
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
    <script src="../public/assets-admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="../public/assets-admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../public/assets-admin/js/off-canvas.js"></script>
    <script src="../public/assets-admin/js/template.js"></script>
    <script src="../public/assets-admin/js/settings.js"></script>
    <script src="../public/assets-admin/js/hoverable-collapse.js"></script>
    <script src="../public/assets-admin/js/todolist.js"></script>
  </body>
</html>