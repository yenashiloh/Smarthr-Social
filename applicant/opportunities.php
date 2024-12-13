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
                <h3 class="fw-bold mb-3">Opportunities</h3>
              </div>
            </div>
            <div class="row">
                <?php
                $openJobs = $conn->prepare("SELECT * FROM jobs WHERE status = 'Open'");
                $openJobs->execute();
                $openResult = $openJobs->get_result();

                $jobs = [];
                while ($openRow = $openResult->fetch_assoc()) {
                    $jobs[] = $openRow;
                }
                ?>
                
                <?php if (!empty($jobs)): ?>
                    <?php foreach ($jobs as $job): ?>
                        <div class="col-md-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($job['job_position']); ?></h5>
                                    <p class="card-text"><strong>Open Position:</strong> <?php echo htmlspecialchars($job['open_position']); ?></p>
                                    <p class="card-text"><strong>Work Place:</strong> <?php echo htmlspecialchars($job['place']); ?></p>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo htmlspecialchars($job['job_id']); ?>">
                                        View Details 
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No Job Opportunities</p>
                <?php endif; ?>
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
