<?php

require "../../database/connection.php";
require "authenticate.php";
require "user_logged.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Extracting POST data
    $applied_job_id = $_POST['applied_job_id']; // APPLIED JOB ID
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $status = $_POST['status'];
    $home_phone = $_POST['home_number'];
    $facebook_profile = $_POST['facebook_profile'];

    // Qualifications
    $education = $_POST['education'];
    $training = $_POST['training'];
    $experience = $_POST['experience'];
    $eligibility = $_POST['eligibility'];
    $competency = $_POST['competency'];

    // Files for documents
    $resume = $_FILES['resume'];
    $filepds = $_FILES['file-pds'];
    $filerating = $_FILES['file-rating'];
    $filecertificate = $_FILES['file-certificate'];
    $filetor = $_FILES['file-tor'];

    // Path where you want to store uploaded files
    $upload_dir = "../../uploads/";

    // Function to handle file upload with unique naming
    function uploadFile($file, $upload_dir)
    {
        // Sanitize and create a valid file path
        $file_name = basename($file['name']);
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Generate a unique file name (e.g., using timestamp or random string)
        $unique_file_name = uniqid(time() . '_', true) . '.' . $file_type;
        $target_file = $upload_dir . $unique_file_name;

        // Allow only pdf, doc, docx files
        $allowed_types = array("pdf", "doc", "docx");
        if (!in_array($file_type, $allowed_types)) {
            return false;
        }

        // Try moving the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $unique_file_name; // Return the unique file name if upload is successful
        }

        return false; // Return false if file upload fails
    }

    // Attempt to upload files
    $resume_path = uploadFile($resume, $upload_dir);
    $filepds_path = uploadFile($filepds, $upload_dir);
    $filerating_path = uploadFile($filerating, $upload_dir);
    $filecertificate_path = uploadFile($filecertificate, $upload_dir);
    $filetor_path = uploadFile($filetor, $upload_dir);

    // Ensure that each path is not empty, set it to an empty string if failed
    $resume_path = $resume_path ? $resume_path : '';
    $filepds_path = $filepds_path ? $filepds_path : '';
    $filerating_path = $filerating_path ? $filerating_path : '';
    $filecertificate_path = $filecertificate_path ? $filecertificate_path : '';
    $filetor_path = $filetor_path ? $filetor_path : '';

    // Continue with the logic to calculate ratings, etc.
    $countRatings = 0;

    if (!empty($education)) {
        if (strtolower($education) === "college" || strtolower($education) === "postgraduate") {
            $countRatings += 10;
        } else {
            $countRatings += 5;
        }
    }

    if (!empty($experience)) {
        if ($experience === 10) {
            $countRatings += 10;
        } else {
            $countRatings += intval($experience);
        }
    }

    if (!empty($eligibility)) {
        $eligibility = strtolower($eligibility);
        if (strpos($eligibility, 'civil service') !== false) {
            $countRatings += 10;
        } elseif (strpos($eligibility, 'licensed') !== false) {
            $countRatings += 8;
        } elseif (strpos($eligibility, 'degree') !== false || strpos($eligibility, 'bachelor') !== false) {
            $countRatings += 5;
        }
    } else {
        $countRatings += 2;
    }

    if (!empty($competency)) {
        $competency = strtolower($competency);
        if (strpos($competency, 'leadership') !== false) {
            $countRatings += 5;
        }
        if (strpos($competency, 'communication') !== false) {
            $countRatings += 5;
        }
        if (strpos($competency, 'project management') !== false) {
            $countRatings += 8;
        }
        if (strpos($competency, 'programming') !== false) {
            $countRatings += 10;
        }
        if (strpos($competency, 'teamwork') !== false) {
            $countRatings += 5;
        }
    } else {
        $countRatings += 2;
    }

    // Prepared statement to insert into the database
    $insert_sql = $conn->prepare("INSERT INTO `job_applicants`(`applied_applicant_id`, `applied_job_id`, `streets`, `city`, `province`, `postal_code`, `applied_status`, `home_phone`, `facebook_link`, `applied_education`, `applied_training`, `applied_experience`, `applied_eligibility`, `applied_competency`, `applied_resume`, `applied_file_pds`, `applied_file_rating`, `applied_file_certificate`, `applied_file_tor`, `applied_ratings`, `applied_date`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    // Bind parameters to the SQL query
    $insert_sql->bind_param("iisssssssssssssssssi", $userId, $applied_job_id, $street, $city, $province, $zip_code, $status, $home_phone, $facebook_profile, $education, $training, $experience, $eligibility, $competency, $resume_path, $filepds_path, $filerating_path, $filecertificate_path, $filetor_path, $countRatings);

    // Execute the query and handle success or failure
    if ($insert_sql->execute()) {
        echo '<script>alert("Successfully Submitted."); window.location.href = "http://localhost/smarthr/applicant/applications.php"</script>';
    } else {
        echo 'Error: ' . $insert_sql->error;
    }
}
