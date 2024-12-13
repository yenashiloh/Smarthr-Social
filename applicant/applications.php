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
    <title>BWD | Application</title>
    <?php include('../partials/link-emp.php'); ?>
<body>
<div class="wrapper">
    <?php include('../partials/sidebar-applicant.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Application</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">All Applications</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">
                        <i class="fas fa-plus"></i> Add Application
                    </button>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th>Job Position</th>
                            <th>Work Place</th>
                            <th >Applied Date</th>
                            <th >Ratings</th>
                            <th >View Details</th>
                            <th>Status</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <?php
                            $applied = $conn->prepare("SELECT ja.*, a.*, j.* FROM job_applicants ja JOIN applicants a ON ja.applied_applicant_id = a.applicant_id JOIN jobs j ON ja.applied_job_id = j.job_id WHERE ja.applied_applicant_id = $userId");
                            $applied->execute();
                            $applied_result = $applied->get_result();

                            $appliCount = 1;
                            $applications = [];
                            while ($applied_rows = $applied_result->fetch_assoc()) {
                                $applications[] = $applied_rows;
                            }
                            ?>
                             <tbody>
                                <?php if (!empty($applications)): ?>
                                    <?php foreach ($applications as $application): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($appliCount++) ?></td>
                                            <td><?php echo htmlspecialchars($application['job_position']) ?></td>
                                            <td><?php echo htmlspecialchars($application['place']) ?></td>
                                            <td><?php echo htmlspecialchars($application['applied_date']) ?></td>
                                            <td><?php echo htmlspecialchars($application['applied_ratings']) ?></td>
                                            <td><a href="http://localhost/smarthr/applicant/view_details.php?application=<?php echo htmlspecialchars($application['applied_id']) ?>">View Details</a></td>
                                            <td><?php echo htmlspecialchars($application['sched_status']) ?> for Interview</td>
                                            <td>
                                                <div class="act-btn">
                                                    <?php if ($application['sched_status'] !== "Scheduled"): ?>
                                                        <form action="http://localhost/smarthr/applicant/handlers/cancel_apply.php" method="POST" onsubmit="confirmCancel(event)">
                                                            <input type="hidden" name="cancel_applied_id" value="<?php echo htmlspecialchars($application['applied_id']) ?>">
                                                            <button type="submit" class="btn btn-warning btn-sm" name="cancelBtn">CANCEL</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <p style="color: red; text-transform:uppercase">Can't Cancel</p>
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
                        <!-- Modal Structure -->
                <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addJobModalLabel">Available Job Opportunities</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $jobInfo = $conn->prepare("SELECT * FROM jobs");
                                $jobInfo->execute();
                                $jobInfo_result = $jobInfo->get_result();

                                $jobs = [];
                                while ($row = $jobInfo_result->fetch_assoc()) {
                                    $jobs[] = $row;
                                }
                                ?>
                                <form id="jobForm" novalidate>
                                    <div class="form-group">
                                        <label for="jobName">Select Job</label>
                                        <select name="jobName" id="jobName" class="form-select" required>
                                            <option value="" selected disabled>Select Job</option>
                                            <?php if (!empty($jobs)): ?>
                                                <?php foreach ($jobs as $job): ?>
                                                    <option value="<?php echo htmlspecialchars($job['job_id']); ?>">
                                                        <?php echo htmlspecialchars($job['job_position']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option value="" disabled>No Available Jobs</option>
                                            <?php endif; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a job before applying.
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="addApplication()">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Job Cards Section -->
            </div>
          </div>
        </div>
      </div>
      <?php include "includes/contents/view-job.php" ?>
      <!-- End -->
    </div>

    <?php include('../partials/footer-emp.php'); ?>
    <script>
    $(document).ready(function () {
        $("#basic-datatables").DataTable({});
    });

    function confirmCancel(event) {
        event.preventDefault();

        if (confirm('Are you sure you want to cancel this application?')) {
            event.target.submit();
        }
    }
    function addApplication() {
        var form = document.getElementById('jobForm');
        var jobSelect = document.getElementById('jobName');

        if (form.checkValidity() === false) {
            form.classList.add('was-validated');
            return; 
        }

        var jobId = jobSelect.value;
        if (!jobId) {
            alert("Please select a job.");
            return;
        }

        if (confirm("Are you sure you want to apply for this job?")) {
            window.location.href = "http://localhost/smarthr/applicant/apply.php?job_id=" + jobId;
        }
    }
</script>
