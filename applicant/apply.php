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
    <title>BWD | Apply</title>
    <?php include('../partials/link-emp.php'); ?>
<body>
<div class="wrapper">
    <?php include('../partials/sidebar-applicant.php'); ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              
            </div>
            <div class="apply">
            <?php
                if (isset($_GET['job_id'])) {
                    $jobId = $_GET['job_id'];

                    $fetchJob = $conn->prepare("SELECT * FROM jobs WHERE job_id = $jobId");
                    $fetchJob->execute();
                    $fetchJob_res = $fetchJob->get_result();

                    if ($fetchJob_res->num_rows === 1) {
                        $jobInfo = $fetchJob_res->fetch_assoc();
                    }
                }
                ?>
                <div class="form">
                    <form action="handlers/apply_process.php" method="POST" class="inputForm" enctype="multipart/form-data">
                        <input type="hidden" name="applied_job_id" value="<?php echo htmlspecialchars($jobInfo['job_id']) ?>">

                        <div class="card mb-4">
                            <div class="card-header">
                                <h2>Application Form</h2>
                                <span>Please complete this document</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($userInfo['firstname']) ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="middlename">Middle name</label>
                                        <input type="text" name="middlename" class="form-control" value="<?php echo htmlspecialchars($userInfo['middlename']) ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="lastname">Last name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($userInfo['lastname']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="age">Age</label>
                                        <input type="text" name="age" class="form-control" value="<?php echo htmlspecialchars($userInfo['age']) ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="gender">Gender</label>
                                        <input type="text" name="gender" class="form-control" value="<?php echo htmlspecialchars($userInfo['gender']) ?>" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="phonenumber">Phone Number</label>
                                        <input type="text" name="phonenumber" class="form-control" value="<?php echo htmlspecialchars($userInfo['phonenumber']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="street">Street/Barangay/Municipality</label>
                                        <input type="text" name="street" class="form-control" placeholder="Enter Info">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter Info">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="province">Province</label>
                                        <input type="text" name="province" class="form-control" placeholder="Enter Info">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="zip_code">Postal/Zip Code</label>
                                        <input type="text" name="zip_code" class="form-control" placeholder="Enter Info">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="" selected disabled>Select Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($userInfo['email']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="home_number">Home Number</label>
                                        <input type="text" name="home_number" class="form-control" placeholder="Enter Info">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="facebook_profile">Facebook Profile Link</label>
                                        <input type="text" name="facebook_profile" class="form-control" placeholder="Enter Info">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Job Opportunity Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="job_position">Applied Job for</label>
                                        <input type="text" name="job_position" class="form-control" value="<?php echo htmlspecialchars($jobInfo['job_position']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="plantilla_item">Plantilla Item</label>
                                        <input type="text" name="plantilla_item" class="form-control" value="<?php echo htmlspecialchars($jobInfo['plantilla_item']) ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="pay_grade">Pay Grade</label>
                                        <input type="text" name="pay_grade" class="form-control" value="<?php echo htmlspecialchars($jobInfo['pay_grade']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="place">Place of Work</label>
                                        <input type="text" name="place" class="form-control" value="<?php echo htmlspecialchars($jobInfo['place']) ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="closing_date">Closing Date</label>
                                        <input type="text" name="closing_date" class="form-control" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Qualification</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="education">Education</label>
                                        <select name="education" class="form-control" required>
                                            <option value="" selected disabled>Select Education Level</option>
                                            <option value="Elementary">Elementary</option>
                                            <option value="High School">High School</option>
                                            <option value="Vocational">Vocational</option>
                                            <option value="College">College</option>
                                            <option value="Postgraduate">Postgraduate</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="training">Training</label>
                                        <input type="text" name="training" class="form-control" placeholder="Enter training details (optional)" autocomplete="off">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="experience">Experience</label>
                                        <select name="experience" class="form-control" required>
                                            <option value="" selected disabled>Select Years of Experience</option>
                                            <option value="1">1 year</option>
                                            <option value="3">3 years</option>
                                            <option value="5">5 years</option>
                                            <option value="10">10+ years</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="eligibility">Eligibility</label>
                                        <input type="text" name="eligibility" class="form-control" placeholder="Enter eligibility" autocomplete="off">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="competency">Competency</label>
                                        <input type="text" name="competency" class="form-control" placeholder="Enter competencies" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>Required Documents</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="resume">Upload Resume (PDF, DOCX) : (Required)</label>
                                        <input type="file" name="resume" class="form-control" accept=".pdf,.docx">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="file-pds">Personal Data Sheet (PDS) : (Optional, PDF, DOCX)</label>
                                        <input type="file" name="file-pds" class="form-control" accept=".pdf,.docx">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="file-rating">Performance Rating : (if applicable, optional)</label>
                                        <input type="file" name="file-rating" class="form-control" accept=".pdf,.docx">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="file-certificate">Certificate of Eligibility/Rating/License : (Optional)</label>
                                        <input type="file" name="file-certificate" class="form-control" accept=".pdf,.docx">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="file-tor">Transcript of Records : (Optional)</label>
                                        <input type="file" name="file-tor" class="form-control" accept=".pdf,.docx">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                            <button type="submit" name="submit" class="btn btn-primary">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- End Job Cards Section -->
            </div>
          </div>
        </div>
      </div>

      <!-- End -->
    </div>

    <?php include('../partials/footer-emp.php'); ?>
