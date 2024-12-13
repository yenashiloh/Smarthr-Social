<?php
session_start();
require "../database/connection.php";
require "handlers/authenticate.php";
require "handlers/logged_info.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BWD | Manage Staff</title>
    <?php include('../partials/link-emp.php'); ?>
  </head>
  <body>
    <div class="wrapper">
    <?php include('../partials/sidebar-emp.php'); ?>
        <div class="container">
          <div class="page-inner">
            <?php require "handlers/count_all.php" ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">All Staffs Account</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                        <i class="fas fa-plus"></i> Add Account
                    </button>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <?php
                        $all_acc = $conn->prepare("SELECT * FROM staffs");
                        $all_acc->execute();
                        $acc_result = $all_acc->get_result();

                        $count = 1;
                        $accounts = [];
                        while ($acc_row = $acc_result->fetch_assoc()) {
                            $accounts[] = $acc_row;
                        }
                    ?>
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Middlename</th>
                                <th>Lastname</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($accounts)): ?>
                                <?php foreach ($accounts as $account): ?>
                                    <tr>
                                    <td><?php echo $count++ ?></td>
                                            <td><?php echo htmlspecialchars($account['firstname']) ?></td>
                                            <td><?php echo htmlspecialchars($account['middlename']) ?></td>
                                            <td><?php echo htmlspecialchars($account['lastname']) ?></td>
                                            <td><?php echo htmlspecialchars($account['age']) ?></td>
                                            <td><?php echo htmlspecialchars($account['gender']) ?></td>
                                            <td><?php echo htmlspecialchars($account['phonenumber']) ?></td>
                                            <td><?php echo htmlspecialchars($account['address']) ?></td>
                                            <td><?php echo htmlspecialchars($account['email']) ?></td>
                                            <td>
                                            <div class="acc-buttons d-flex align-items-center">
                                            <!-- Update Button -->
                                            <button 
                                                type="button"
                                                class="btn btn-warning btn-sm me-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#updateStaffModal<?php echo $account['staff_id']; ?>" 
                                                data-update-id="<?php echo $account['staff_id']; ?>">
                                                Update
                                            </button>
                                            
                                            <!-- Delete Form -->
                                            <form action="handlers/account/delete.account.php" method="POST" class="mb-0">
                                                <input type="hidden" name="delete_staff" value="<?php echo htmlspecialchars($account['staff_id']); ?>">
                                                <button class="btn btn-danger btn-sm" type="submit" name="deleteStaffBtn">Delete</button>
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
                
              <!-- Add Account Modal -->
            <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStaffModalLabel">CREATE STAFF INFORMATION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="handlers/account/add.account.php" method="POST" class="addFormStaff">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="middlename" class="form-label">Middlename</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" value="">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age" value="">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" name="submitAddStaff" class="btn btn-primary" value="Create">
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>

            <?php 
            foreach ($accounts as $account): ?>
              <!------- UPDATE MODAL ------------->
              <div class="modal fade" id="updateStaffModal<?php echo $account['staff_id']; ?>" tabindex="-1" aria-labelledby="updateStaffModalLabel<?php echo $account['staff_id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateStaffModalLabel<?php echo $account['staff_id']; ?>">UPDATE STAFF INFORMATION</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <input type="hidden" name="staff_id" value="<?php echo $account['staff_id']; ?>">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="update_firstname<?php echo $account['staff_id']; ?>" class="form-label">Firstname</label>
                                        <input type="text" class="form-control" name="update_firstname" id="update_firstname<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['firstname']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="update_middlename<?php echo $account['staff_id']; ?>" class="form-label">Middlename</label>
                                        <input type="text" class="form-control" name="update_middlename" id="update_middlename<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['middlename']); ?>">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="update_lastname<?php echo $account['staff_id']; ?>" class="form-label">Lastname</label>
                                        <input type="text" class="form-control" name="update_lastname" id="update_lastname<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['lastname']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="update_age<?php echo $account['staff_id']; ?>" class="form-label">Age</label>
                                        <input type="number" class="form-control" name="update_age" id="update_age<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['age']); ?>">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="update_gender<?php echo $account['staff_id']; ?>" class="form-label">Gender</label>
                                        <select name="update_gender" id="update_gender<?php echo $account['staff_id']; ?>" class="form-select">
                                            <option value="Male" <?php echo ($account['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo ($account['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="update_phone<?php echo $account['staff_id']; ?>" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="update_phone" id="update_phone<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['phonenumber']); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_address<?php echo $account['staff_id']; ?>" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="update_address" id="update_address<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['address']); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_email<?php echo $account['staff_id']; ?>" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="update_email" id="update_email<?php echo $account['staff_id']; ?>" value="<?php echo htmlspecialchars($account['email']); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="update_password<?php echo $account['staff_id']; ?>" class="form-label">Update Password</label>
                                    <input type="password" class="form-control" name="update_password" id="update_password<?php echo $account['staff_id']; ?>" value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" name="submitUpdateBtn" class="btn btn-primary" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- End -->
    </div>
    <?php include('../partials/footer-emp.php'); ?>
    <script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});
  });
</script>
</body>
</html>