<?php
require 'connection.php';

$response = ["data" => []];

// Check for GET reference number
if (isset($_GET['referenceNumber'])) {
    $ref = $_GET['referenceNumber'];

    $result = Database::search("SELECT appointment.reference_number,
                                       appointment.appointment_date,
                                       appointment_status.id AS appointment_status_id,
                                       appointment_status.status,
                                       service.title AS service_title,
                                       user.first_name,
                                       user.last_name,
                                       user.nic,
                                       user.mobile, 
                                       department.department AS department_name
                                       FROM `appointment` 
                                    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`
                                    INNER JOIN `service` ON `appointment`.`service_id` = `service`.`id`
                                    INNER JOIN `branch` ON `service`.`branch_id` = `branch`.`id`
                                    INNER JOIN `department` ON `branch`.`department_id` = `department`.`id`
                                    INNER JOIN `user` ON `appointment`.`added_user_nic` = `user`.`nic`
                                WHERE `reference_number` = '$ref'");

    if ($row = $result->fetch_assoc()) {
        $row["password"] = null;
        $username = $row["first_name"] . " " . $row["last_name"];
        $row["username"] = $username;
        $row["first_name"] = null;
        $row["last_name"] = null;
        $response["data"] = $row;
    } else {
        $response["error"] = "No appointment found";
    }
} else {
    $response["error"] = "Reference number not provided";
}

// Send JSON response
echo json_encode($response);
