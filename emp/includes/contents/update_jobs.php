<!-- Update Job Modal -->
<?php foreach ($jobs as $job): ?>
<div class="modal fade" id="updateJobModal<?php echo htmlspecialchars($job['job_id']); ?>" tabindex="-1" aria-labelledby="updateJobModalLabel<?php echo htmlspecialchars($job['job_id']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="updateJobModalLabel<?php echo htmlspecialchars($job['job_id']); ?>">Update Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="handlers/jobs/update_job.php" method="POST">
                    <input type="hidden" name="update_job_id" value="<?php echo htmlspecialchars($job['job_id']); ?>">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="updateJobPosition<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Job Position</label>
                            <input type="text" id="updateJobPosition<?php echo htmlspecialchars($job['job_id']); ?>" name="update_jobPosition" class="form-control" value="<?php echo htmlspecialchars($job['job_position']); ?>" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="updatePlantillaItem<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Plantilla Item</label>
                            <input type="number" id="updatePlantillaItem<?php echo htmlspecialchars($job['job_id']); ?>" name="update_plantillaItem" class="form-control" value="<?php echo htmlspecialchars($job['plantilla_item']); ?>" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="updatePayGrade<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Pay Grade</label>
                            <input type="number" id="updatePayGrade<?php echo htmlspecialchars($job['job_id']); ?>" name="update_payGrade" class="form-control" value="<?php echo htmlspecialchars($job['pay_grade']); ?>" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="updateMonthlySalary<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Monthly Salary</label>
                            <input type="text" id="updateMonthlySalary<?php echo htmlspecialchars($job['job_id']); ?>" name="update_monthlySalary" class="form-control" value="<?php echo htmlspecialchars($job['monthly_salary']); ?>" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="updateEducation<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Education</label>
                            <input type="text" id="updateEducation<?php echo htmlspecialchars($job['job_id']); ?>" name="update_education" class="form-control" value="<?php echo htmlspecialchars($job['education']); ?>" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="updateTraining<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Training</label>
                            <input type="text" id="updateTraining<?php echo htmlspecialchars($job['job_id']); ?>" name="update_training" class="form-control" value="<?php echo htmlspecialchars($job['training']); ?>" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="updateExperience<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Experience</label>
                            <input type="text" id="updateExperience<?php echo htmlspecialchars($job['job_id']); ?>" name="update_experience" class="form-control" value="<?php echo htmlspecialchars($job['experience']); ?>" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="updateEligibility<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Eligibility</label>
                            <input type="text" id="updateEligibility<?php echo htmlspecialchars($job['job_id']); ?>" name="update_eligibility" class="form-control" value="<?php echo htmlspecialchars($job['eligibility']); ?>" required autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="updateCompetency<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Competency</label>
                        <input type="text" id="updateCompetency<?php echo htmlspecialchars($job['job_id']); ?>" name="update_competency" class="form-control" value="<?php echo htmlspecialchars($job['competency']); ?>" required autocomplete="off">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="updatePlace<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Place</label>
                            <input type="text" id="updatePlace<?php echo htmlspecialchars($job['job_id']); ?>" name="update_place" class="form-control" value="<?php echo htmlspecialchars($job['place']); ?>" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="updateOpenPosition<?php echo htmlspecialchars($job['job_id']); ?>" class="form-label">Open Position</label>
                            <input type="number" id="updateOpenPosition<?php echo htmlspecialchars($job['job_id']); ?>" name="update_openPosition" class="form-control" value="<?php echo htmlspecialchars($job['open_position']); ?>" required autocomplete="off">
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>