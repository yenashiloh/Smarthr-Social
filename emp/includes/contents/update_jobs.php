<div class="update-modal" id="updateJob<?php echo htmlspecialchars($job['job_id']) ?>">
    <div class="update-content" id="addJobBg">
        <div class="update-header">
            <h4>UPDATE AN JOB</h4>
        </div>
        <div class="update-body">
            <form action="handlers/jobs/update_job.php" method="POST" class="addForm" onsubmit="updateConfirm(event)">
                <input type="hidden" name="update_job_id" value="<?php echo htmlspecialchars($job['job_id']) ?>">
                <div class="update-row">
                    <div class="update-input">
                        <p>Job Position:</p>
                        <input type="text" name="update_jobPosition" value="<?php echo htmlspecialchars($job['job_position']) ?>" required autocomplete="off">
                    </div>

                    <div class="update-input">
                        <p>Plantilla Item:</p>
                        <input type="number" name="update_plantillaItem" value="<?php echo htmlspecialchars($job['plantilla_item']) ?>" required autocomplete="off">
                    </div>
                </div>

                <div class="update-row">
                    <div class="update-input">
                        <p>Pay Grade:</p>
                        <input type="number" name="update_payGrade" value="<?php echo htmlspecialchars($job['pay_grade']) ?>" required autocomplete="off">
                    </div>

                    <div class="update-input">
                        <p>Monthly Salary:</p>
                        <input type="text" name="update_monthlySalary" value="<?php echo htmlspecialchars($job['monthly_salary']) ?>" required autocomplete="off">
                    </div>
                </div>

                <div class="update-row">
                    <div class="update-input">
                        <p>Education:</p>
                        <input type="text" name="update_education" value="<?php echo htmlspecialchars($job['education']) ?>" required autocomplete="off">
                    </div>

                    <div class="update-input">
                        <p>Training:</p>
                        <input type="text" name="update_training" value="<?php echo htmlspecialchars($job['training']) ?>" required autocomplete="off">
                    </div>
                </div>

                <div class="update-row">
                    <div class="update-input">
                        <p>Experience:</p>
                        <input type="text" name="update_experience" value="<?php echo htmlspecialchars($job['experience']) ?>" required autocomplete="off">
                    </div>

                    <div class="update-input">
                        <p>Eligibility:</p>
                        <input type="text" name="update_eligibility" value="<?php echo htmlspecialchars($job['eligibility']) ?>" required autocomplete="off">
                    </div>
                </div>
                <div class="update-input">
                    <p>Competency:</p>
                    <input type="text" name="update_competency" value="<?php echo htmlspecialchars($job['competency']) ?>" required autocomplete="off">
                </div>
                <div class="update-row">
                    <div class="update-input">
                        <p>Place:</p>
                        <input type="text" name="update_place" value="<?php echo htmlspecialchars($job['place']) ?>" required autocomplete="off">
                    </div>

                    <div class="update-input">
                        <p>Open Position:</p>
                        <input type="number" name="update_openPosition" value="<?php echo htmlspecialchars($job['open_position']) ?>" required autocomplete="off">
                    </div>
                </div>

                <div class="update-buttons">
                    <input type="submit" name="add_account" value="UPDATE JOB" style="background-color: blue">
                    <button type="button" style="background-color: red" onclick="closeUpdateModal(<?php echo htmlspecialchars($job['job_id']) ?>)">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>