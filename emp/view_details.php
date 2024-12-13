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
    <title>BWD | Applicant</title>
    <?php include('../partials/link-emp.php'); ?>
  </head>

  <body>
  <div class="wrapper">
    <?php include('../partials/sidebar-emp.php'); ?>
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Application Form</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Applicants Application</h4>
                        </div>
                        <div class="card-body">
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
                          <form action="handlers/apply_process.php" method="POST" class="inputForm" enctype="multipart/form-data">
                            <input type="hidden" name="applied_job_id" value="<?php echo htmlspecialchars($applicationData['job_id']) ?>">

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['firstname']) ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['middlename']) ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['lastname']) ?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['age']) ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Gender</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['gender']) ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['phonenumber']) ?>" readonly>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Street/Barangay/Municipality</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['streets'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">City</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['city'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Province</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        value="<?= htmlspecialchars($applicationData['province'] ?? '') ?>" 
                                        placeholder="None" 
                                        readonly>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Postal/Zip Code</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        value="<?= htmlspecialchars($applicationData['postal_code'] ?? '') ?>" 
                                        placeholder="None" 
                                        readonly>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">Status</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        value="<?= htmlspecialchars($applicationData['applied_status'] ?? '') ?>" 
                                        placeholder="None" 
                                        readonly>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['email']) ?>" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Home Number</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        value="<?= htmlspecialchars($applicationData['home_phone'] ?? '') ?>" 
                                        placeholder="None" 
                                        readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Facebook Profile Link</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        value="<?= htmlspecialchars($applicationData['facebook_link'] ?? '') ?>" 
                                        placeholder="None" 
                                        readonly>
                                </div>
                            </div>

                            <h5>Job Information</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Applied Job for</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['job_position']) ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plantilla Item</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['plantilla_item']) ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pay Grade</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['pay_grade']) ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Place of Work</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($applicationData['place']) ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Closing Date</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>

                            <h5>Qualification</h5>
                            <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Education</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['applied_education'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Training</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['applied_training'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Experience</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars(($applicationData['applied_experience'] ?? '') . ' years') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Eligibility</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['applied_eligibility'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Competency</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="<?= htmlspecialchars($applicationData['applied_competency'] ?? '') ?>" 
                                    placeholder="None" 
                                    readonly>
                            </div>
                        </div>

                            <div class="container mt-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Resume:</strong> 
                                    <?php if (!empty($applicationData['applied_resume'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_resume']); ?>" target="_blank">View Resume</a>
                                    <?php else: ?>
                                        <span>Resume not available</span>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Personal Data Sheet (PDS):</strong> 
                                    <?php if (!empty($applicationData['applied_file_pds'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_pds']); ?>" target="_blank">View PDS</a>
                                    <?php else: ?>
                                        <span>PDS not available</span>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Performance Rating:</strong> 
                                    <?php if (!empty($applicationData['applied_file_rating'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_rating']); ?>" target="_blank">View Performance Rating</a>
                                    <?php else: ?>
                                        <span>Performance Rating not available</span>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Certificate of Eligibility/Rating/License:</strong> 
                                    <?php if (!empty($applicationData['applied_file_certificate'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_certificate']); ?>" target="_blank">View Certificate</a>
                                    <?php else: ?>
                                        <span>Certificate not available</span>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Transcript of Records:</strong> 
                                    <?php if (!empty($applicationData['applied_file_tor'])): ?>
                                        <a href="http://localhost/smarthr/uploads/<?php echo htmlspecialchars($applicationData['applied_file_tor']); ?>" target="_blank">View Transcript</a>
                                    <?php else: ?>
                                        <span>Transcript of Records not available</span>
                                    <?php endif; ?>
                                </li>
                            </ul>

                            <?php if ($applicationData['sched_status'] !== "Declined"): ?>
                                <?php
                                $fetch_sched = $conn->prepare("SELECT * FROM schedules WHERE schedule_applied_id = $application_id");
                                $fetch_sched->execute();
                                $sched_res = $fetch_sched->get_result();

                                if ($sched_res->num_rows > 0) {
                                    $scheduleData = $sched_res->fetch_assoc();

                                    echo '<div class="item">
                                            <div class="table">
                                                <table>
                                                    <tr>
                                                        <td colspan="3"><strong>Scheduled Date and Time</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date :</strong> ' . $scheduleData['schedule_date'] . ' </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Time :</strong> ' . $scheduleData['schedule_time'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Note :</strong> Be exact on date and time given</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>';
                                } else {
                                    echo "Not yet Schedule";
                                }
                                ?>
                            <?php endif; ?>

                            <?php if ($applicationData['sched_status'] === "Declined"): ?>
                                <div class="alert alert-danger">
                                    <strong>Declined Application</strong>
                                    <p><strong>Reason:</strong> <?php echo htmlspecialchars($applicationData['remarks']); ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="text-center mt-3">
                                <a href="http://localhost/smarthr/emp/application.php" class="btn btn-primary mt-3">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End -->
    </div>
    <?php include('../partials/footer-emp.php'); ?>
    <script src="http://localhost/smarthr/emp/js/navigation.js"></script>
    <script>
        function showViewModal(jobId) {
            document.getElementById("viewModal" + jobId).style.display = "flex";
        }

        function closeViewModal(jobId) {
            document.getElementById("viewModal" + jobId).style.display = "none";
        }
    </script>
</body>

</html>