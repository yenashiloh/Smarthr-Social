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
    <title>BWD | Schedules</title>
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
                <h3 class="fw-bold mb-3">Schedules</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">All Schedule for Interview</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <?php
                        $newApp = $conn->prepare("SELECT ja.*, a.*, j.*, s.schedule_date, s.schedule_time, s.schedule_id 
                            FROM job_applicants ja 
                            JOIN applicants a ON ja.applied_applicant_id = a.applicant_id 
                            JOIN jobs j ON ja.applied_job_id = j.job_id 
                            JOIN schedules s ON s.schedule_applied_id = ja.applied_id 
                            ORDER BY s.schedule_date DESC");
                        $newApp->execute();
                        $new_result = $newApp->get_result();

                        $newCount = 1;
                        $newlys = [];
                        while ($new_rows = $new_result->fetch_assoc()) {
                            $newlys[] = $new_rows;
                        }
                      ?>
                      <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Fullname</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Job Position</th>
                            <th>View Details</th>
                            <th>Schedule Date</th>
                            <th>Schedule Time</th>
                            <th>Actions</th>
                          </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($newlys)): ?>
                                <?php foreach ($newlys as $new): ?>
                                    <tr>
                                        <td><?php echo $newCount++ ?></td>
                                        <td><?php echo htmlspecialchars($new['firstname'] . " " . $new['lastname']) ?></td>
                                        <td><?php echo htmlspecialchars($new['phonenumber']) ?></td>
                                        <td><?php echo htmlspecialchars($new['email']) ?></td>
                                        <td style="text-transform:uppercase"><?php echo htmlspecialchars($new['job_position']) ?></td>
                                        <td><a href="view_details.php?application=<?php echo htmlspecialchars($new['applied_id']) ?>">View Details</a></td>
                                        <td><?php echo htmlspecialchars($new['schedule_date'] ?? 'N/A') ?></td>
                                        <td><?php echo htmlspecialchars($new['schedule_time'] ?? 'N/A') ?></td>
                                        <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Reschedule Button -->
                                            <button
                                                type="button"
                                                class="btn btn-link btn-primary me-2 reschedule-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#reschedModal"
                                                data-schedule-id="<?php echo htmlspecialchars($new['schedule_id'] ?? '0') ?>"
                                                title="Reschedule">
                                                <i class="fa fa-calendar-plus"></i>
                                            </button>

                                            <!-- Candidate Button -->
                                            <form action="handlers/applicant/add_candidate.php" method="POST" onsubmit="confirmCandate(event)">
                                                <input type="hidden" name="candidate_applied_id" value="<?php echo htmlspecialchars($new['applied_id']) ?>">
                                                <button
                                                    type="submit"
                                                    class="btn btn-link btn-secondary me-2"
                                                    data-bs-toggle="tooltip"
                                                    title="Candidate">
                                                    <i class="fas fa-user-plus"></i>
                                                </button>
                                            </form>

                                            <!-- Delete Button -->
                                            <?php if ($_SESSION['role'] !== "Staff"): ?>
                                                <form action="handlers/applicant/delete_schedule.php" method="POST" onsubmit="confirmDelete(event)">
                                                    <input type="hidden" name="delete_schedule_id" value="<?php echo htmlspecialchars($new['schedule_id'] ?? '0') ?>">
                                                    <input type="hidden" name="applied_id" value="<?php echo htmlspecialchars($new['applied_id']) ?>">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-link btn-danger me-2"
                                                        id="deleteActBtn"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete">
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

          <!-- Modal Reschedule-->
            <div class="modal fade" id="reschedModal" tabindex="-1" aria-labelledby="reschedModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reschedModalLabel">RE-SCHEDULE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="handlers/applicant/reschedule.php" method="POST" onsubmit="confirmSched(event)">
                                <input type="hidden" name="schedule_id" id="modal-schedule-id" value="">
                                
                                <!-- Schedule Date -->
                                <div class="mb-3">
                                    <label for="schedule_date" class="form-label">Schedule Date</label>
                                    <input type="date" class="form-control" name="schedule_date" id="schedule_date" required>
                                </div>
                                
                                <!-- Schedule Time -->
                                <div class="mb-3">
                                    <label for="schedule_time" class="form-label">Schedule Time</label>
                                    <input type="time" class="form-control" name="schedule_time" id="schedule_time" required>
                                </div>
                                
                                <!-- Buttons -->
                                <div class="d-flex justify-content-end">
                                  <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button type="submit" name="submit_sched" class="btn btn-primary">Schedule</button>
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
    function confirmSched(event) {
        event.preventDefault();

        if (confirm("Are you sure to do this?")) {
            event.target.submit();
        }
    }

    function confirmCandate(event) {
        event.preventDefault();

        if (confirm("Are you sure to add this applicant to candidate?")) {
            event.target.submit();
        }
    }

    function confirmDelete(event) {
        event.preventDefault();

        if (confirm("Are you sure to delete this?")) {
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
    });
    </script>
</body>
</html>