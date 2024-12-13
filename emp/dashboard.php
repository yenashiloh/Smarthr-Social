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
    <title>BWD | Dashboard</title>
    <?php include('../partials/link-emp.php'); ?>
  </head>

  <body>
    <div class="wrapper">
    <?php include('../partials/sidebar-emp.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Summary of Reports</h6>
              </div>
            </div>
            <?php require "handlers/count_all.php" ?>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-user-friends"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total of Applicants</p>
                          <h4 class="card-title"><?php echo $total_applicant ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-tie"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total of Candidates</p>
                          <h4 class="card-title"><?php echo $total_candidate ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-briefcase"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total of Jobs</p>
                          <h4 class="card-title"><?php echo $total_job ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($_SESSION['role'] !== "Staff"): ?>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                  
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total System Users</p>
                          <h4 class="card-title"><?php echo $total_users ?></h4>
                          <?php else: ?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                  
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Total System Users</p>
                          <h4 class="card-title"><?php echo $total_job_open ?></h4>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Newly Applicants</div>
                      <div class="card-tools">
                          <a 
                            href="http://localhost/smarthr/emp/application.php" 
                            class="btn btn-primary"
                            role="button">
                            View All
                          </a>
                        </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col" >Phone Number</th>
                            <th scope="col" >Email</th>
                            <th scope="col" >Job Position</th>
                            <th scope="col" >Applied Date</th>
                            <th scope="col" >Action</th>
                          </tr>
                        </thead>
                        <?php
                          $newApp = $conn->prepare("SELECT ja.*, a.*, j.* FROM job_applicants ja JOIN applicants a ON ja.applied_applicant_id = a.applicant_id JOIN jobs j ON ja.applied_job_id = j.job_id ORDER BY ja.applied_date DESC");
                          $newApp->execute();
                          $new_result = $newApp->get_result();

                          $newCount = 1;
                          $newlys = [];
                          while ($new_rows = $new_result->fetch_assoc()) {
                          $newlys[] = $new_rows;
                          }
                        ?>
                        <tbody>
                        <?php if (!empty($newlys)): ?>
                          <?php foreach ($newlys as $new): ?>
                          <tr>
                            <td><?php echo $newCount++ ?></td>
                            <td><?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?></td>
                            <td><?php echo htmlspecialchars($new['phonenumber']) ?></td>
                            <td><?php echo htmlspecialchars($new['email']) ?></td>
                            <td><?php echo htmlspecialchars($new['job_position']) ?></td>
                            <td><?php echo htmlspecialchars($new['applied_date']) ?></td>
                            <td>
                            <a href="http://localhost/smarthr/emp/view_details.php?application=<?php echo htmlspecialchars($new['applied_id'])?>">View Details</a>
                            </td>
                            <?php endforeach; ?>
                              <?php else: ?>
                                <tr>
                                <td colspan="8">No New Applicants Found</td>
                                 </tr>
                              <?php endif; ?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Upcoming Interview</div>
                      <div class="card-tools">
                          <a 
                            href="http://localhost/smarthr/emp/schedules.php" 
                            class="btn btn-primary"
                            role="button"
                          >
                            View All
                          </a>
                        </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <?php
                        $fetch_is = $conn->prepare(
                          "SELECT s.*, a.firstname, a.lastname 
                          FROM schedules s 
                          JOIN job_applicants ja ON s.schedule_applied_id = ja.applied_id 
                          JOIN applicants a ON ja.applied_applicant_id = a.applicant_id 
                          WHERE s.schedule_date BETWEEN ? AND ? 
                          ORDER BY s.schedule_date ASC, s.schedule_time ASC"
                        );
                        $fetch_is->bind_param("ss", $currentDay, $nextDay);
                        $fetch_is->execute();
                        $result = $fetch_is->get_result();

                        $countIs = 1;
                        $currents = [];
                        while ($fetch_row = $result->fetch_assoc()) {
                          $currents[] = $fetch_row;
                        }
                      ?>
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Full Name</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Date</th>
                          <th scope="col">Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (count($currents) > 0): ?>
                          <?php foreach ($currents as $current): ?>
                            <tr>
                              <td><?php echo $countIs++; ?></td>
                              <td><?php echo htmlspecialchars($current['firstname'] . " " . $current['lastname']); ?></td>
                              <td><?php echo htmlspecialchars($current['schedule_date']); ?></td>
                              <td><?php echo htmlspecialchars($current['schedule_time']); ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="5" class="text-center">No Upcoming Interviews</td>
                          </tr>
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
      </div>
      <!-- End -->
    </div>
    <?php include('../partials/footer-emp.php'); ?>