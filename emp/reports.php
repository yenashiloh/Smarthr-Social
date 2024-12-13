<?php
session_start();
require "../database/connection.php";
require "handlers/authenticate.php";
require "handlers/logged_info.php";
require "handlers/count_all.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BWD | Reports</title>
    <?php include('../partials/link-emp.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                          <p class="card-category">Total Applicants</p>
                          <h4 class="card-title"><?php echo $total_applied ?></h4>
                          <a href="" style="color: white !important; text-decoration: underline !important;">View All</a>
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
                          <p class="card-category">Total Candidates</p>
                          <h4 class="card-title"><?php echo $total_candidate ?></h4>
                          <a href="" style="color: white !important; text-decoration: underline !important;">View All</a>
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
                          <i class="fas fa-user-tie"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Jobs</p>
                          <h4 class="card-title"><?php echo $total_job ?></h4>
                          <a href="manage_jobs.php" style="color: white !important; text-decoration: underline !important;">View All</a>
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
                          <p class="card-category">Hired Applicants</p>
                          <h4 class="card-title"><?php echo $total_job_open ?></h4>
                          <a href="hired_applicants.php" style="color: white !important; text-decoration: underline !important;">View All</a>
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
                    <h4 class="card-title">Ranking</h4>
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
                      <?php require "handlers/contents/report.php" ?>
                        <thead>
                          <tr>
                            <th>Fullname</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Job Position</th>
                            <th>Ratings</th>
                            <th>Ranked</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newlys as $new): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?></td>
                                    <td><?php echo htmlspecialchars($new['phonenumber']) ?></td>
                                    <td><?php echo htmlspecialchars($new['email']) ?></td>
                                    <td style="text-transform:uppercase"><?php echo htmlspecialchars($new['job_position']) ?></td>
                                    <td><?php echo htmlspecialchars($new['applied_ratings']) ?></td>
                                    <td><?php echo $newCount++ ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Charts Section -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Job Applicants</h4>
                  </div>
                  <div class="card-body">
                    <?php require "handlers/contents/chart1.php" ?>
                    <canvas id="jobApplicantsChart" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Monthly Applicants</h4>
                  </div>
                  <div class="card-body">
                    <?php require "handlers/contents/chart2.php" ?>
                    <div class="year-selection mb-3">
                      <form method="GET">
                        <label for="year">Select Year: </label>
                        <select name="year" id="year" onchange="this.form.submit()">
                          <?php for ($year = $currentYear; $year <= $maxYear; $year++) : ?>
                            <option value="<?= $year ?>" <?= ($year == $selectedYear) ? 'selected' : '' ?>>
                              <?= $year ?>
                            </option>
                          <?php endfor; ?>
                        </select>
                      </form>
                    </div>
                    <canvas id="applicantsChart" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Applicants by Age</h4>
                  </div>
                  <div class="card-body">
                    <?php require "handlers/contents/chart3.php" ?>
                    <canvas id="ageApplicantsChart" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Applicants by Gender</h4>
                  </div>
                  <div class="card-body">
                    <?php require "handlers/contents/chart4.php" ?>
                    <canvas id="genderApplicantsChart" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts Script -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        // Job Applicants Chart Setup
        const jobPositions = <?php echo json_encode($jobPositions); ?>;
        const jobApplicants = <?php echo json_encode($numApplicantsArray); ?>;

        const jobData = {
            labels: jobPositions,
            datasets: [{
                label: 'Total Job Applicants',
                data: jobApplicants,
                borderWidth: 1,
            }]
        };

        const jobConfig = {
            type: 'bar',
            data: jobData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        },
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Job Positions'
                        }
                    }
                }
            }
        };

        // Monthly Applicants Chart Setup
        const applicantsData = <?php echo json_encode($applicantCounts); ?>;
        const selectedYear = <?php echo $selectedYear; ?>;

        const monthData = {
            labels: [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ],
            datasets: [{
                label: `Total Applicants for ${selectedYear}`,
                data: applicantsData,
                borderWidth: 2,
            }]
        };

        const monthConfig = {
            type: 'line',
            data: monthData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        },
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    }
                }
            }
        };

        // Age Applicants Chart Setup
        const ages = <?php echo $ages_json; ?>;
        const ageJa = <?php echo $counts_json; ?>;
        const ageJaRounded = ageJa.map(count => Math.round(count));

        const ageData = {
            labels: ages,
            datasets: [{
                label: 'Age of Applicants',
                data: ageJaRounded,
                borderWidth: 1,
            }]
        };

        const ageConfig = {
            type: 'bar',
            data: ageData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        },
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    }
                }
            }
        };

        // Gender Applicants Chart Setup
        const genderApplicantsData = <?php echo json_encode($applicantCounts); ?>;

        const genderData = {
            labels: ['Male', 'Female'],
            datasets: [{
                label: `Gender of Applicants`,
                data: genderApplicantsData,
                borderWidth: 1,
            }]
        };

        const genderConfig = {
            type: 'bar',
            data: genderData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Applicants'
                        },
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    }
                }
            }
        };

        // Render Charts
        new Chart(document.getElementById("jobApplicantsChart"), jobConfig);
        new Chart(document.getElementById("applicantsChart"), monthConfig);
        new Chart(document.getElementById("ageApplicantsChart"), ageConfig);
        new Chart(document.getElementById("genderApplicantsChart"), genderConfig);
      </script>
      <!-- End -->
    </div>
    <?php include('../partials/footer-emp.php'); ?>
    <script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
