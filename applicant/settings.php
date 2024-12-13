<?php
require "../database/connection.php";
require "handlers/authenticate.php";
require "handlers/user_logged.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BWD | Opportunities</title>
    <?php include('../partials/link-emp.php'); ?>
<body>
<div class="wrapper">
    <?php include('../partials/sidebar-applicant.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Account Settings</h3>
              </div>
            </div>
            <div class="container">
                <!-- Account Settings Form -->
                <form action="" method="POST">
                    
                    <!-- Profile Section Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Profile Picture</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img src="http://localhost/smarthr/public/assets/defaultuser.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                                    <input type="file" class="form-control" id="profile">
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="update_firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="update_firstname" value="<?php echo htmlspecialchars($userInfo['firstname']) ?>" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="update_middlename" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="update_middlename" value="<?php echo htmlspecialchars($userInfo['middlename']) ?>" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="update_lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="update_lastname" value="<?php echo htmlspecialchars($userInfo['lastname']) ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Personal Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="update_age" class="form-label">Age</label>
                                        <input type="text" class="form-control" name="update_age" value="<?php echo htmlspecialchars($userInfo['age']) ?>" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="update_gender" class="form-label">Gender</label>
                                        <select name="update_gender" id="update_gender" class="form-select" required>
                                            <option value="<?php echo htmlspecialchars($userInfo['gender']) ?>"><?php echo htmlspecialchars($userInfo['gender']) ?></option>
                                            <?php if ($userInfo['gender'] === "Male"): ?>
                                                <option value="Female">Female</option>
                                            <?php else: ?>
                                                <option value="Male">Male</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="update_phonenumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="update_phonenumber" value="<?php echo htmlspecialchars($userInfo['phonenumber']) ?>" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address and Email Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Contact Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="update_address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="update_address" value="<?php echo htmlspecialchars($userInfo['address']) ?>" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="update_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="update_email" value="<?php echo htmlspecialchars($userInfo['email']) ?>" required autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- Password Update Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Change Password</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="update_password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="update_password" placeholder="UPDATE PASSWORD" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit_update" class="btn btn-primary w-25">Update</button>
                    </div>
                </form>
            </div>

            <!-- End Job Cards Section -->
            </div>
          </div>
        </div>
      </div>

      <!-- End -->
    </div>

    <?php include('../partials/footer-emp.php'); ?>
