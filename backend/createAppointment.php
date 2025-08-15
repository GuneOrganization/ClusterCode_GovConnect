<?php
header("Content-Type: application/json");
require 'connection.php';
require './core/IdGenerator.php';


function sendResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}

if (isset($_SESSION['user'])) {
    sendResponse("fail", "No logged user found");
}

$input = json_decode(file_get_contents("php://input"), true);

$service_id = $input['service_id'] ?? '';
$appointment_date = $input['appointment_date'] ?? '';
$time_slot_id = $input['time_slot_id'] ?? '';

if (!$service_id || !$time_slot_id || !$appointment_date) {
    sendResponse("fail", "All fields are required");
}

try {
 
    $reference_no = IdGenerator::generateId("appointment","reference_number","APP");
    $currentDateTime = date("Y-m-d H:i:s");
    $addedUserNIC = $_SESSION['user']['nic'];

    Database::iud("INSERT INTO `appointment` (reference_number ,added_user_nic ,added_datetime ,service_id , appointment_status_id, appointment_date, time_slot_id)
        VALUES ('{$reference_no}', '{$addedUserNIC}', '{$currentDateTime}', '{$service_id}', '1', '{$appointment_date}','{$time_slot_id}'
        )
    ");

    sendResponse("success", "Booking created successfully", ["reference_no" => $reference_no]);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}

?>