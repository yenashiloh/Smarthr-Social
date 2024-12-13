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
    <title>BWD | APPLICANT</title>
    <link rel="stylesheet" href="http://localhost/smarthr/public/src/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/smarthr/public/src/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="http://localhost/smarthr/public/css/global.css">
    <!-- APPLICANT CSS CONTENTS -->
    <link rel="stylesheet" href="http://localhost/smarthr/applicant/css/navigations.css">
    <link rel="stylesheet" href="http://localhost/smarthr/applicant/css/opportunities.css">
    <!-- <link rel="stylesheet" href="http://localhost/smarthr/applicant/css/form.css"> -->
    <link rel="stylesheet" href="http://localhost/smarthr/applicant/css/addFrom.css">
</head>

<body>
    <?php include "includes/navigation.php" ?>
    <main>
        <section>
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
                        <div class="head-form">
                            <h2>Application Form</h2>
                            <span>Please complete this document</span>
                        </div>
                        <div class="body-form">
                            <div class="item">
                                <div class="table">
                                    <table>
                                        <tr>
                                            <td colspan="3"><strong>Applicant Information</strong></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['firstname']) ?>" readonly>
                                                    <p>First name</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['middlename']) ?>" readonly>
                                                    <p>Middle name</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['lastname']) ?>" readonly>
                                                    <p>Last name</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['age']) ?>" readonly>
                                                    <p>Age</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['gender']) ?>" readonly>
                                                    <p>Gender</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="" value="<?php echo htmlspecialchars($userInfo['phonenumber']) ?>" readonly>
                                                    <p>Phone Number</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Current Address</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="td">
                                                    <input type="text" name="street" placeholder="Enter Info">
                                                    <p>Street/Barangay/Municipality</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="city" placeholder="Enter Info">
                                                    <p>City</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="province" placeholder="Enter Info">
                                                    <p>Province</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="zip_code" placeholder="Enter Info">
                                                    <p>Postal/Zip Code</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <select name="status" id="">
                                                        <option value="" selected disabled>Select Status</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Marraid">Marraid</option>
                                                    </select>
                                                    <p>Status</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td">
                                                    <input type="text" value="<?php echo htmlspecialchars($userInfo['email']) ?>" readonly>
                                                    <p>Email</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="home_number" placeholder="Enter Info">
                                                    <p>Home Number</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" name="facebook_profile" placeholder="Enter Info">
                                                    <p>Facebook Profile Link</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="item">
                                <div class="table">
                                    <table>
                                        <tr>
                                            <td colspan="3"><strong>Details of Job Opportunity</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="text" value="<?php echo htmlspecialchars($jobInfo['job_position']) ?>" readonly>
                                                    <p>Applied Job for</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">
                                                <div class="td">
                                                    <input type="text" value="<?php echo htmlspecialchars($jobInfo['plantilla_item']) ?>" readonly>
                                                    <p>Plantilla Item</p>
                                                </div>
                                            </td>
                                            <td style="width: 50%">
                                                <div class="td">
                                                    <input type="text" value="<?php echo htmlspecialchars($jobInfo['pay_grade']) ?>" readonly>
                                                    <p>Pay Grade</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td">
                                                    <input type="text" value="<?php echo htmlspecialchars($jobInfo['place']) ?>" readonly>
                                                    <p>Place of Work</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="td">
                                                    <input type="text" value="" readonly>
                                                    <p>Closing Date</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="item">
                                <div class="table">
                                    <table>
                                        <tr>
                                            <td colspan="3"><strong>Qualification</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <select name="education" required>
                                                        <option value="" selected disabled>Select Education Level</option>
                                                        <option value="Elementary">Elementary</option>
                                                        <option value="High School">High School</option>
                                                        <option value="Vocational">Vocational</option>
                                                        <option value="College">College</option>
                                                        <option value="Postgraduate">Postgraduate</option>
                                                    </select>
                                                    <p>Education</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="text" name="training" placeholder="Enter training details (optional)" autocomplete="off">
                                                    <p>Training</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <select name="experience" required>
                                                        <option value="" selected disabled>Select Years of Experience</option>
                                                        <option value="1">1 year</option>
                                                        <option value="3">3 years</option>
                                                        <option value="5">5 years</option>
                                                        <option value="10">10+ years</option>
                                                    </select>
                                                    <p>Experience</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="text" name="eligibility" placeholder="Enter eligibility" autocomplete="off">
                                                    <p>Eligibility</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="text" name="competency" placeholder="Enter competencies" autocomplete="off">
                                                    <p>Competency</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="item">
                                <div class="table">
                                    <table>
                                        <tr>
                                            <td colspan="3"><strong>Required Documents</strong></td>
                                        </tr>
                                        <tr style="border-bottom:1px solid rgba(0,0,0,0.5)">
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="file" id="resume" name="resume" accept=".pdf,.docx">
                                                    <p>Upload Resume (PDF, DOCX) : (Required)</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom:1px solid rgba(0,0,0,0.5)">
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="file" id="file-pds" name="file-pds" accept=".pdf,.docx">
                                                    <p>Personnal Data Sheet(PDS) : (Optional, PDF, DOCX) :</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom:1px solid rgba(0,0,0,0.5)">
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="file" id="file-rating" name="file-rating" accept=".pdf,.docx">
                                                    <p>Performance Rating : (if applicable.optional) :</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom:1px solid rgba(0,0,0,0.5)">
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="file" id="file-certificate" name="file-certificate" accept=".pdf,.docx">
                                                    <p>Certificate of Eligibility/Rating/License : (optional) :</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom:1px solid rgba(0,0,0,0.5)">
                                            <td colspan="3">
                                                <div class="td">
                                                    <input type="file" id="file-tor" name="file-tor" accept=".pdf,.docx">
                                                    <p>Transcript of Records : (optional) :</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="apply-buttons">
                            <a href="">BACK</a>
                            <button type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="http://localhost/smarthr/applicant/js/navigation.js"></script>
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