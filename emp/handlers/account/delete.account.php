<?php

require "../../../database/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteStaffBtn'])) {
        $delete_staff = $_POST['delete_staff'];

        $delete_sql = $conn->prepare("DELETE FROM staffs WHERE staff_id = ?");
        $delete_sql->bind_param("i", $delete_staff);
        if ($delete_sql->execute()) {
            echo '<script> alert("Successfully Deleted."); location.href = "../../manage_staff.php"; </script>';
            exit();
        }
    }
} else {
    echo '<script> alert("Request Method Error."); location.href = "../../accounts.php"; </script>';
    exit();
}
