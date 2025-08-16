<?php
session_start();

require 'connection.php';
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

// // Check if user session exists
// if (!isset($_SESSION['user'])) {
//     sendResponse("fail", "No logged user found");
// }

// // Validate user
// if (!Validation::isValidUser($_SESSION['user']['nic'])) {
//     sendResponse("fail", "Invalid User");
// }

try {
    // Fetch appointments with related data
    $query = "
        SELECT 
            a.reference_number,
            a.added_user_nic,
            CONCAT(u.first_name, ' ', u.last_name) AS added_user_name,
            s.title AS service_title,
            asu.status AS appointment_status,
            a.appointment_date,
            ts.start_time,
            ts.end_time,
            a.accepted_user_nic,
            CONCAT(u2.first_name, ' ', u2.last_name) AS accepted_user_name,
            a.completed_user_nic,
            CONCAT(u3.first_name, ' ', u3.last_name) AS completed_user_name,
            a.accepted_datetime,
            a.completed_datetime,
            a.feedback,
            a.rating,
            a.rejected_message
        FROM appointment a
        INNER JOIN service s ON a.service_id = s.id
        INNER JOIN appointment_status asu ON a.appointment_status_id = asu.id
        INNER JOIN time_slot ts ON a.time_slot_id = ts.id
        INNER JOIN user u ON a.added_user_nic = u.nic
        LEFT JOIN user u2 ON a.accepted_user_nic = u2.nic
        LEFT JOIN user u3 ON a.completed_user_nic = u3.nic
        WHERE added_user_nic='112233445V' ORDER BY a.appointment_date DESC
    ";

    $resultset = Database::search($query);

    if ($resultset->num_rows > 0) {
        $appointments = [];
        while ($row = $resultset->fetch_assoc()) {
            $appointments[] = $row;
        }
        sendResponse("success", "Get Appointments Successful", $appointments);
    } else {
        sendResponse("success", "No Appointments Found", []);
    }
} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
?>