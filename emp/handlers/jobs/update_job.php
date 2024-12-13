<?php

require "../../../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $jobPosition = $_POST['update_jobPosition'];
    $plantillaItem = $_POST['update_plantillaItem'];
    $payGrade = $_POST['update_payGrade'];
    $monthlySalary = $_POST['update_monthlySalary'];
    $education = $_POST['update_education'];
    $training = $_POST['update_training'];
    $experience = $_POST['update_experience'];
    $eligibility = $_POST['update_eligibility'];
    $competency = $_POST['update_competency'];
    $place = $_POST['update_place'];
    $openPosition = $_POST['update_openPosition'];
    $update_job_id = $_POST['update_job_id'];

    $update_sql = $conn->prepare("UPDATE `jobs` SET `job_position`= ?,`plantilla_item`= ?,`pay_grade`= ?,`monthly_salary`= ?,`education`= ?,`training`= ?,
    `experience`= ?,`eligibility`= ?,`competency`= ?,`open_position`= ?,`place`= ? WHERE `job_id` = ?");
    $update_sql->bind_param("siissssssssi", $jobPosition, $plantillaItem, $payGrade, $monthlySalary, $education, $training, $experience, $eligibility, $competency, $openPosition, $place, $update_job_id);
    if ($update_sql->execute()) {
        echo '<script> alert("Successfully Updated Job."); location.href = "../../manage_jobs.php"; </script>';
            exit();
    }
}
