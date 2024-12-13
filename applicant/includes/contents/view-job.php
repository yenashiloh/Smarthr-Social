<?php foreach ($jobs as $job): ?>
    <div class="modal fade" id="viewModal<?php echo htmlspecialchars($job['job_id']); ?>" tabindex="-1" aria-labelledby="viewModalLabel<?php echo htmlspecialchars($job['job_id']); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel<?php echo htmlspecialchars($job['job_id']); ?>">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="dataInfo mb-4">
                    <strong>Position Title:</strong>
                    <h5><?php echo htmlspecialchars($job['job_position']); ?></h5>
                </div>

                <!-- Two-column layout for the job details -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="dataInfo">
                            <strong>Plantilla Item:</strong>
                            <p><?php echo htmlspecialchars($job['plantilla_item']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Monthly Salary:</strong>
                            <p><?php echo htmlspecialchars($job['monthly_salary']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Education:</strong>
                            <p><?php echo htmlspecialchars($job['education']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Experience:</strong>
                            <p><?php echo htmlspecialchars($job['experience']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Competency:</strong>
                            <p><?php echo htmlspecialchars($job['competency']); ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="dataInfo">
                            <strong>Pay Grade:</strong>
                            <p><?php echo htmlspecialchars($job['pay_grade']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Training:</strong>
                            <p><?php echo htmlspecialchars($job['training']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Eligibility:</strong>
                            <p><?php echo htmlspecialchars($job['eligibility']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Place of Work:</strong>
                            <p><?php echo htmlspecialchars($job['place']); ?></p>
                        </div>
                        <div class="dataInfo">
                            <strong>Open Position:</strong>
                            <p><?php echo htmlspecialchars($job['open_position']); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Close and Apply buttons -->

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a href="http://localhost/smarthr/applicant/apply.php?job_id=<?php echo htmlspecialchars($job['job_id']); ?>">
                            <button class="btn btn-primary">Apply</button>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>