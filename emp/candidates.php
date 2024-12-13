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
                    <h4 class="card-title">All Applicants Application</h4>
                    <a href="hired_applicants.php" class="btn btn-primary">View Hired</a>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Fullname</th>
                            <th>Job Position</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Ratings</th>
                            <th>Ranked</th>
                            <th>View Details</th>
                            <th>Actions</th>
                          </tr>
                            </thead>
                            <?php
                            $newApp = $conn->prepare("SELECT c.*, ja.*, a.*, j.* FROM candidates c JOIN job_applicants ja ON c.candidate_applied_id = ja.applied_id JOIN applicants a ON ja.applied_applicant_id = a.applicant_id 
                            JOIN jobs j ON ja.applied_job_id = j.job_id WHERE c.candidate_status <> 'Approved' ORDER BY ja.applied_ratings DESC");
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
                                        <td><?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?></td>
                                        <td style="text-transform:uppercase"><?php echo htmlspecialchars($new['job_position']) ?></td>
                                        <td><?php echo htmlspecialchars($new['applied_date']) ?></td>
                                        <td><?php echo htmlspecialchars($new['candidate_status']) ?></td>
                                        <td><?php echo htmlspecialchars($new['applied_ratings']) ?></td>
                                        <td><?php echo $newCount++ ?></td>
                                        <td><a href="http://localhost/smarthr/emp/view_details.php?application=<?php echo htmlspecialchars($new['applied_id']) ?>">View Details</a></td>
                                        <td>
                                            <?php if ($new['candidate_status'] !== 'Approved' && $new['candidate_status'] !== 'Declined'): ?>
                                                <div class="d-flex">
                                                    <button
                                                        type="button"
                                                        class="btn btn-link btn-success me-2 approved-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#approvedModal"
                                                        data-approve-id="<?php echo htmlspecialchars($new['candidate_id']) ?>"
                                                        title="Approve">
                                                        <i class="fa fa-check-circle"></i>
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="btn btn-link btn-danger decline-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#declineModal"
                                                        data-schedule-id="<?php echo htmlspecialchars($new['candidate_id']) ?>"
                                                        title="Decline">
                                                        <i class="fa fa-times-circle"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="approvedModal" tabindex="-1" aria-labelledby="approvedModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="approvedmodalLabel">APPROVE APPLICANT</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="handlers/applicant/approved.php" method="POST">
                            <input type="hidden" name="approve_candidate_id" value="<?php echo htmlspecialchars($new['candidate_id']) ?>">
                                
                                <!-- Approve Remarks -->
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Approve Remarks (<?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?>)</label>
                                    <textarea name="remarks" id="remarks" class="form-control" placeholder="Remarks" rows="8" required></textarea>
                                </div>
                                
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-2">Confirm</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

              <!-- Decline Modal -->
            <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="declineModalLabel">DECLINE APPLICANT</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <input type="hidden" name="decline_applicant_id" id="modal-decline-id" value="">
                                
                                <!-- Decline Remarks -->
                                <div class="mb-3">
                                    <label for="remarks" class="form-label">Decline Remarks (<?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?>)</label>
                                    <textarea name="remarks" id="remarks" class="form-control" placeholder="Reason why decline" rows="8" required></textarea>
                                </div>
                                
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-2">Confirm</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
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
    <script>
  $(document).ready(function () {
    $("#basic-datatables").DataTable({});
  });
 
</script>
