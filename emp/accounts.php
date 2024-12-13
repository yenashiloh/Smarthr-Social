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
    <title>BWD | Accounts</title>
    <?php include('../partials/link-emp.php'); ?>
  </head>
  <body>
    <div class="wrapper">
    <?php include('../partials/sidebar-emp.php'); ?>
        <div class="container">
          <div class="page-inner">
            <?php require "handlers/count_all.php" ?>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Applicants Account</p>
                          <h4 class="card-title"><?php echo $total_applicant ?></h4>
                          <a href="manage_applicant.php" style="color: white !important; text-decoration: underline !important;">View All</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Staffs Account</p>
                          <h4 class="card-title"><?php echo $total_staff ?></h4>
                          <a href="manage_staff.php" style="color: white !important; text-decoration: underline !important;">View All</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-user-shield"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Admin Account</p>
                          <h4 class="card-title"><?php echo $total_admin ?></h4>
                          <a href="manage_admin.php" style="color: white !important; text-decoration: underline !important;">View All</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="fas fa-users-cog"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total System Account</p>
                          <h4 class="card-title"><?php echo $total_users ?></h4>
                          <a href="" style="color: white !important; text-decoration: underline !important;">View All</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Newly Members</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <?php
                        $all_acc = $conn->prepare("SELECT * FROM applicants ORDER BY created_at DESC LIMIT 15");
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
                            <th>No.</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            <th>Lastname</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Joined</th>
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
                                        <td><?php echo htmlspecialchars($account['created_at']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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
