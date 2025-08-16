<?php

// Testing URL
//http://localhost/ClusterCode_GovConnect/backend/createAppointment.php

// Test Data JSON
//{"service_id":"SER0000001","appointment_date":"2025-08-15","time_slot_id":"1"}

session_start();
header("Content-Type: application/json");
require 'connection.php';
require './core/customGenerator.php';
require './core/Validation.php';

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

if(!Validation::isValidUser($_SESSION['user']['nic'])){
    sendResponse("fail", "Invalid User");
}

$input = json_decode(file_get_contents("php://input"), true);

$service_id = $input['service_id'] ?? '';
$appointment_date = $input['appointment_date'] ?? '';
$time_slot_id = $input['time_slot_id'] ?? '';

if (!$service_id || !$time_slot_id || !$appointment_date) {
    sendResponse("fail", "All fields are required");
}

try {

    $resultSet = Database::search("SELECT * FROM appointment a
    INNER JOIN appointment_status s ON a.appointment_status_id = s.id
    WHERE service_id='{$service_id}' AND appointment_date='{$appointment_date}' AND time_slot_id='{$time_slot_id}' AND (s.status='Accepted' OR s.status='Completed') ");

    if ($resultSet->num_rows == 0) {

        $maxRetries = 5;
        $attempt = 0;
        $inserted = false;

        while (!$inserted && $attempt < $maxRetries) {

            $reference_no = CustomGenerator::generateId("appointment", "reference_number", "APP");
            $currentDateTime = date("Y-m-d H:i:s");
            $addedUserNIC = $_SESSION['user']['nic'];

            try {

                Database::iud("INSERT INTO `appointment` (reference_number ,added_user_nic ,added_datetime ,service_id , appointment_status_id, appointment_date, time_slot_id)
                    VALUES ('{$reference_no}', '{$addedUserNIC}', '{$currentDateTime}', '{$service_id}', '1', '{$appointment_date}','{$time_slot_id}')
                ");

                sendResponse("success", "Booking created successfully", ["reference_no" => $reference_no]);

        } catch (mysqli_sql_exception $ex) {

            $attempt++;
            if ($ex->getCode() == 1062) {
                if ($attempt >= $maxRetries) {
                    throw new Exception("Could not generate unique reference number after {$maxRetries} attempts.");
                }
            } else {
                throw $ex;
            }
        }

    }

    } else {
        sendResponse("fail", "Time slot not available");
    }


   
} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
?>