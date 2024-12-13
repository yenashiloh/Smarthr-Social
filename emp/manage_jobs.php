<?php
session_start();
require "../database/connection.php";

if (!isset($_SESSION['user_id']) && (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'Staff' && $_SESSION['role'] !== 'Admin'))) {
    header("Location: http://localhost/smarthr/");
    exit();
}

require "handlers/logged_info.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>BWD | Manage Job</title>
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
                    <h4 class="card-title mb-0">All Jobs</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
                        <i class="fas fa-plus"></i> Add Job
                    </button>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Position</th>
                            <th>Plantilla Item</th>
                            <th>Pay Grade</th>
                            <th>Monthly Salary</th>
                            <th>Education</th>
                            <th>Training</th>
                            <th>Experience</th>
                            <th>Eligibility</th>
                            <th>Competency</th>
                            <th>Place</th>
                            <th>Open Position</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php
                            $fetch_jobs = $conn->prepare("SELECT * FROM jobs");
                            $fetch_jobs->execute();
                            $fetch_result = $fetch_jobs->get_result();

                            $countJobs = 1;
                            $jobs = [];
                            while ($fetch_row = $fetch_result->fetch_assoc()) {
                                $jobs[] = $fetch_row;
                            }
                            ?>
                            <tbody>
                                <?php if (!empty($jobs)): ?>
                                    <?php foreach ($jobs as $job): ?>
                                        <tr>
                                            <td><?php echo $countJobs++ ?></td>
                                            <td><?php echo htmlspecialchars($job['job_position']) ?></td>
                                            <td><?php echo htmlspecialchars($job['plantilla_item']) ?></td>
                                            <td><?php echo htmlspecialchars($job['pay_grade']) ?></td>
                                            <td><?php echo htmlspecialchars($job['monthly_salary']) ?></td>
                                            <td><?php echo htmlspecialchars($job['education']) ?></td>
                                            <td><?php echo htmlspecialchars($job['training']) ?></td>
                                            <td><?php echo htmlspecialchars($job['experience']) ?></td>
                                            <td><?php echo htmlspecialchars($job['eligibility']) ?></td>
                                            <td><?php echo htmlspecialchars($job['competency']) ?></td>
                                            <td><?php echo htmlspecialchars($job['place']) ?></td>
                                            <td><?php echo htmlspecialchars($job['open_position']) ?></td>
                                            <td><?php echo htmlspecialchars($job['status']) ?></td>
                                            <td>
                                            <div class="acc-buttons d-flex align-items-center">
                                                   <!-- Update Job Button -->
                                                    <button 
                                                        type="button"
                                                        class="btn btn-warning btn-sm me-2" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#updateJobModal<?php echo htmlspecialchars($job['job_id']); ?>"
                                                        data-update-id="<?php echo htmlspecialchars($job['job_id']); ?>">
                                                        Update
                                                    </button>
                                                    <?php if ($_SESSION['role'] !== "Staff"): ?>
                                                        <form action="handlers/jobs/delete_job.php" method="POST" onsubmit="deleteConfirm(event)">
                                                            <input type="hidden" name="delete_job_id" value="<?php echo htmlspecialchars($job['job_id']) ?>">
                                                            <button class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    <?php endif; ?>
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
              <?php include "includes/contents/add_jobs.php" ?>
              <?php include "includes/contents/update_jobs.php" ?>
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