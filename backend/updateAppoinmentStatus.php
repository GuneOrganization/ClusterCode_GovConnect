<?php
header("Content-Type: application/json");
require 'connection.php'; 

$referenceNumber = $_GET['reference_number'] ?? '';
$newStatus = strtolower(trim($_GET['status'] ?? ''));
echo("Reference Number: $referenceNumber, New Status: $newStatus\n");

$response = ["status" => "fail", "message" => "Unknown error"]; // default

if (!empty($referenceNumber) && !empty($newStatus)) {

    // Check appointment exists
    $result = Database::search("SELECT `status` FROM `appointment` 
    INNER JOIN `appointment_status` ON `appointment`.`appointment_status_id` = `appointment_status`.`id`  
    WHERE `reference_number` = '$referenceNumber'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStatus = strtolower($row['status']);

        if ($newStatus === "accepted") {
            if ($currentStatus === "pending") {
                Database::iud("
                               UPDATE `appointment`
                               SET `appointment_status_id` = 
                               (SELECT `id` FROM `appointment_status` WHERE `status` = 'Accepted')
                               WHERE `reference_number` = '$referenceNumber'
                          ");
                $response = ["status" => "success", "message" => "Appointment accepted"];
            } else {
                $response = ["status" => "fail", "message" => "Can only accept pending appointments"];
            }
        } else if ($newStatus === "rejected") {
            Database::iud("
                               UPDATE `appointment`
                               SET `appointment_status_id` = 
                               (SELECT `id` FROM `appointment_status` WHERE `status` = 'Rejected')
                               WHERE `reference_number` = '$referenceNumber'
                          ");
            $response = ["status" => "success", "message" => "Appointment rejected"];
        } else if ($newStatus === "completed") {
             Database::iud("
                               UPDATE `appointment`
                               SET `appointment_status_id` = 
                               (SELECT `id` FROM `appointment_status` WHERE `status` = 'Completed')
                               WHERE `reference_number` = '$referenceNumber'
                          ");
            $response = ["status" => "success", "message" => "Appointment marked as completed"];
        } else {
            $response = ["status" => "fail", "message" => "Invalid status provided"];
        }
    } else {
        $response = ["status" => "fail", "message" => "Appointment not found"];
    }
} else {
    $response = ["status" => "fail", "message" => "Missing appointment ID or status"];
}

echo json_encode($response);
