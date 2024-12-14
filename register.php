<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <?php include('partials/link.php'); ?>
  </head>

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
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 shadow-lg">
                <h4>Registration</h4>
                <h6 class="fw-light">Create your account</h6>
                <form action="register_process.php" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" placeholder="Enter first name" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control form-control-lg" id="middlename" name="middlename" placeholder="Enter middle name" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" placeholder="Enter last name" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control form-control-lg" id="age" name="age" placeholder="Enter age" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control form-control-lg" name="gender" id="gender" required style="color:black;">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <i class="mdi mdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="number" class="form-control form-control-lg" name="phonenumber" id="phonenumber" placeholder="Enter phone number" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control form-control-lg" name="address" id="address" placeholder="Enter address" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter email" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" required  autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" name="submit_register">
                        Register
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
    <?php include('partials/footer.php'); ?>
  </body>
</html>