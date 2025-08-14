<?php

// Testing URL
//http://localhost/ClusterCode_GovConnect/backend/getAvailableTimeSlotsByService.php?service_id=SER0000002&appointment_date=2025-08-15

require 'connection.php';

function sendResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}


if (!isset($_GET['service_id']) || empty($_GET['service_id'])) {
    sendResponse("fail", "service_id is required");
}

if (!isset($_GET['appointment_date']) || empty($_GET['appointment_date'])) {
    sendResponse("fail", "appointment_date is required");
}

$service_id = $_GET['service_id'];
$appointment_date = $_GET['appointment_date'];

try {
    $result = Database::search("SELECT ts.id, ts.start_time, ts.end_time FROM time_slot ts WHERE ts.id NOT IN (
            SELECT a.time_slot_id FROM appointment a WHERE a.service_id = '{$service_id}' AND a.appointment_date='{$appointment_date}'
        )
        ORDER BY ts.start_time ASC
    ");

    $slots = [];
    while ($row = $result->fetch_assoc()) {
        $slots[] = $row;
    }

    if (empty($slots)) {
        sendResponse("success", "No available time slots for this service");
    }

    sendResponse("success", "Available time slots retrieved", $slots);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
