
<!-- Add Job Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Add a Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="handlers/jobs/add_job.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jobPosition" class="form-label">Job Position</label>
                            <input type="text" id="jobPosition" name="jobPosition" class="form-control" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="plantillaItem" class="form-label">Plantilla Item</label>
                            <input type="number" id="plantillaItem" name="plantillaItem" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="payGrade" class="form-label">Pay Grade</label>
                            <input type="number" id="payGrade" name="payGrade" class="form-control" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="monthlySalary" class="form-label">Monthly Salary</label>
                            <input type="text" id="monthlySalary" name="monthlySalary" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="education" class="form-label">Education</label>
                            <input type="text" id="education" name="education" class="form-control" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="training" class="form-label">Training</label>
                            <input type="text" id="training" name="training" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" id="experience" name="experience" class="form-control" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="eligibility" class="form-label">Eligibility</label>
                            <input type="text" id="eligibility" name="eligibility" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="competency" class="form-label">Competency</label>
                        <input type="text" id="competency" name="competency" class="form-control" required autocomplete="off">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" id="place" name="place" class="form-control" required autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label for="openPosition" class="form-label">Open Position</label>
                            <input type="number" id="openPosition" name="openPosition" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_account" class="btn btn-primary">Add Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
