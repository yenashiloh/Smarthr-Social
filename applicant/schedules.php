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
    <title>BWD | Schedules</title>
    <?php include('../partials/link-emp.php'); ?>
<body>
<div class="wrapper">
    <?php include('../partials/sidebar-applicant.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
                <h3 class="fw-bold mb-3">Schedules</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Application Schedule</h4>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Position</th>
                                <th>Work Place</th>
                                <th>Applied Date</th>
                                <th>Ratings</th>
                                <th>View Details</th>
                                <th>Schedule Date</th>
                                <th>Schedule Time</th>
                            </tr>
                        </thead>
                        <?php
                            $applied = $conn->prepare("SELECT s.*, ja.*, a.*, j.* 
                                                    FROM schedules s 
                                                    JOIN job_applicants ja ON s.schedule_applied_id = ja.applied_id 
                                                    JOIN applicants a ON ja.applied_applicant_id = a.applicant_id 
                                                    JOIN jobs j ON ja.applied_job_id = j.job_id 
                                                    WHERE s.schedule_applied_id = ja.applied_id 
                                                    AND a.applicant_id = $userId 
                                                    ORDER BY s.schedule_date ASC, s.schedule_time DESC");
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
                                        <td><?php echo htmlspecialchars($application['schedule_date']) ?></td>
                                        <td><?php echo htmlspecialchars($application['schedule_time']) ?></td>
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

    
</script>