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
                  <div class="card-header">
                    <h4 class="card-title">All Applicants Application</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Fullname</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Job Position</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Ratings</th>
                            <th>View Details</th>
                            <th>Action</th>
                          </tr>
                          
                            </thead>
                            <?php
                            $newApp = $conn->prepare("SELECT ja.*, a.*, j.* FROM job_applicants ja JOIN applicants a ON ja.applied_applicant_id = a.applicant_id JOIN jobs j ON ja.applied_job_id = j.job_id ORDER BY ja.applied_date DESC");
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
                                        <td><?php echo $newCount++ ?></td>
                                        <td><?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?></td>
                                        <td><?php echo htmlspecialchars($new['phonenumber']) ?></td>
                                        <td><?php echo htmlspecialchars($new['email']) ?></td>
                                        <td style="text-transform:uppercase"><?php echo htmlspecialchars($new['job_position']) ?></td>
                                        <td><?php echo htmlspecialchars($new['applied_date']) ?></td>
                                        <td><?php echo htmlspecialchars($new['sched_status']) ?></td>
                                        <td><?php echo htmlspecialchars($new['applied_ratings']) ?></td>
                                        <td><a href="view_details.php?application=<?php echo htmlspecialchars($new['applied_id']) ?>">View Details</a></td>
                                        <td>
                                        <div class="action-btn d-flex align-items-center">
                                        <?php if (($new['sched_status'] !== 'Declined') && ($new['sched_status'] !== 'Scheduled')): ?>
                                          <!-- Schedule Button -->
                                          <button
                                            type="button"
                                            class="btn btn-link btn-primary me-2 reschedule-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#schedModal"
                                            data-schedule-id="<?php echo htmlspecialchars($new['applied_id']) ?>"
                                            title="Schedule">
                                              <i class="fa fa-calendar-plus"></i>
                                          </button>

                                          <!-- Decline Button -->
                                          <button
                                            type="button"
                                            class="btn btn-link btn-warning me-2 decline-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#declineModal"
                                            data-schedule-id="<?php echo htmlspecialchars($new['applied_id']) ?>"
                                            title="Decline">
                                              <i class="fa fa-times-circle"></i>
                                          </button>
                                      <?php endif; ?>

                                          <?php if ($_SESSION['role'] !== 'Staff'): ?>
                                              <!-- Delete Button -->
                                              <form action="handlers/applicant/delete_applicant.php" method="POST" onsubmit="deleteConfirm(event)">
                                                  <input type="hidden" name="delete_applied_id" value="<?php echo htmlspecialchars($new['applied_id']) ?>">
                                                  <button
                                                      type="submit"
                                                      class="btn btn-link btn-danger"
                                                      id="deleteActBtn"
                                                      data-bs-toggle="tooltip"
                                                      title="Delete"
                                                  >
                                                      <i class="fa fa-trash"></i>
                                                  </button>
                                              </form>
                                          <?php endif; ?>
                                      </div>
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

          <!-- Schedule Modal -->
          <div class="modal fade" id="schedModal" tabindex="-1" aria-labelledby="schedModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="schedModalLabel">ADD SCHEDULE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="handlers/applicant/add_sched.php" method="POST" onsubmit="confirmSched(event)">
                              <input type="hidden" name="sched_applied_id" id="modal-schedule-id" value="">
                              
                              <!-- Schedule Date -->
                              <div class="mb-3">
                                  <label for="sched_date" class="form-label">Schedule Date</label>
                                  <input type="date" name="sched_date" id="sched_date" class="form-control" required>
                              </div>
                              
                              <!-- Schedule Time -->
                              <div class="mb-3">
                                  <label for="sched_time" class="form-label">Schedule Time</label>
                                  <input type="time" name="sched_time" id="sched_time" class="form-control" required>
                              </div>
                              
                              <!-- Buttons -->
                              <div class="d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary me-2">Schedule</button>
                                  <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
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
                             <form action="handlers/applicant/decline_applicant.php" method="POST">
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

  function deleteConfirm(event) {
    event.preventDefault();
    if (confirm("Are you sure to delete this application?")) {
      event.target.submit();
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
        const rescheduleButtons = document.querySelectorAll('.reschedule-btn');
        
        rescheduleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const scheduleId = this.getAttribute('data-schedule-id');
                document.getElementById('modal-schedule-id').value = scheduleId;
            });
        });

        const declineButtons = document.querySelectorAll('.decline-btn');

        declineButtons.forEach(button => {
            button.addEventListener('click', function() {
                const declineId = this.getAttribute('data-schedule-id');
                document.getElementById('modal-decline-id').value = declineId;
            });
        });
    });
</script>
