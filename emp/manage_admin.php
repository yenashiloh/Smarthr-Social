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
    <title>BWD | Manage Admin</title>
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
                    <h4 class="card-title mb-0">All Admin Account</h4>
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Add Account</button>
                </div>

                  <div class="card-body">
                    <div class="table-responsive">
                    <?php

                    $all_acc = $conn->prepare("SELECT * FROM admins");
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
                                            <div class="d-flex">
                                                <button class="btn btn-warning btn-sm w-100 me-2">Update</button>
                                                <button class="btn btn-danger btn-sm w-100">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
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
