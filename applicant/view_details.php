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
    <title>BWD | Application Form</title>
    <?php include('../partials/link-emp.php'); ?>
<body>
<div class="wrapper">
    <?php include('../partials/sidebar-applicant.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
             
            </div>
            <?php
            if (isset($_GET['application'])) {
                $application_id = $_GET['application'];

                $fetch_application = $conn->prepare("SELECT ja.*, a.*, j.* FROM job_applicants ja JOIN applicants a ON ja.applied_applicant_id = a.applicant_id JOIN jobs j ON ja.applied_job_id = j.job_id WHERE ja.applied_id = $application_id");
                $fetch_application->execute();
                $fetch_res = $fetch_application->get_result();
                if ($fetch_res->num_rows === 1) {
                    $applicationData = $fetch_res->fetch_assoc();
                }
            }
            ?>

    <div class="row">
        <div class="col-12">
            <form action="handlers/apply_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="applied_job_id" value="<?php echo htmlspecialchars($applicationData['job_id']) ?>">
                
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title mb-0">Application Form</h4>
                        </div>
                        <div class="card-body">
                        <div class="row">
                        <div class="col-4">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['firstname']) ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['middlename']) ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['lastname']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['age']) ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Gender</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['gender']) ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['phonenumber']) ?>" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label class="form-label">Street/Barangay/Municipality</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['streets']) ?>" placeholder="None" readonly>
                        </div>
                        <div class="col-6">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['city']) ?>" placeholder="None" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label class="form-label">Province</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['province']) ?>" placeholder="None" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Postal/Zip Code</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['postal_code']) ?>" placeholder="None" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_status']) ?>" placeholder="None" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['email']) ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Home Number</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['home_phone']) ?>" placeholder="None" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Facebook Profile Link</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['facebook_link']) ?>" placeholder="None" readonly>
                        </div>
                    </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Job Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Applied Job</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['job_position']) ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Plantilla Item</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['plantilla_item']) ?>" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Pay Grade</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['pay_grade']) ?>" readonly>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label class="form-label">Place of Work</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['place']) ?>" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Closing Date</label>
                                    <input type="text" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Qualifications</strong>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Education</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_education']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Training</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_training']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_experience']) ?> years" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Eligibility</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_eligibility']) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Competency</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['applied_competency']) ?>" readonly>
                            </div>
                        </div>
                    </div>
             
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Submitted Documents</strong>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php if (!empty($applicationData['applied_resume'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_resume']); ?>" target="_blank" class="list-group-item list-group-item-action">
                                            Resume
                                        </a>
                                    <?php else: ?>
                                        <span class="list-group-item">Resume not available</span>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($applicationData['applied_file_pds'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_pds']); ?>" target="_blank" class="list-group-item list-group-item-action">
                                            Personal Data Sheet (PDS)
                                        </a>
                                    <?php else: ?>
                                        <span class="list-group-item">PDS not available</span>
                                    <?php endif; ?>

                                    <?php if (!empty($applicationData['applied_file_rating'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_rating']); ?>" target="_blank" class="list-group-item list-group-item-action">
                                            Performance Rating
                                        </a>
                                    <?php else: ?>
                                        <span class="list-group-item">Performance Rating not available</span>
                                    <?php endif; ?>

                                    <?php if (!empty($applicationData['applied_file_certificate'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_certificate']); ?>" target="_blank" class="list-group-item list-group-item-action">
                                            Certificate of Eligibility/Rating/License
                                        </a>
                                    <?php else: ?>
                                        <span class="list-group-item">Certificate not available</span>
                                    <?php endif; ?>

                                    <?php if (!empty($applicationData['applied_file_tor'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_tor']); ?>" target="_blank" class="list-group-item list-group-item-action">
                                            Transcript of Records
                                        </a>
                                    <?php else: ?>
                                        <span class="list-group-item">Transcript of Records not available</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
               

                <?php if ($applicationData['sched_status'] !== "Declined"): ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Scheduled Date and Time</strong>
                            </div>
                            <div class="card-body">
                                <?php
                                $fetch_sched = $conn->prepare("SELECT * FROM schedules WHERE schedule_applied_id = $application_id");
                                $fetch_sched->execute();
                                $sched_res = $fetch_sched->get_result();

                                if ($sched_res->num_rows > 0) {
                                    $scheduleData = $sched_res->fetch_assoc();
                                    echo '<div >
                                            <h6><strong>Date:</strong> ' . $scheduleData['schedule_date'] . '</h6>
                                            <h6><strong>Time:</strong> ' . $scheduleData['schedule_time'] . '</h6>
                                            <h6 class="text-muted">Be exact on date and time given</h6>
                                        </div>';
                                } else {
                                    echo '<div class="alert alert-warning">Not yet Scheduled</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($applicationData['sched_status'] === "Declined"): ?>
                    <div class="col-md-12">
                        <div class="card border-danger mb-3">
                            <div class="card-header bg-danger text-white">
                                Declined Application
                            </div>
                            <div class="card-body text-danger">
                                <p><strong>Reason:</strong> <?php echo htmlspecialchars($applicationData['remarks']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-3 text-center">
                    <a href="http://localhost/smarthr/applicant/applications.php" class="btn btn-secondary">BACK</a>
                </div>
                </div>
          </div>
        </div>
      </div>
     
      <!-- End -->
    </div>

    <?php include('../partials/footer-emp.php'); ?>
