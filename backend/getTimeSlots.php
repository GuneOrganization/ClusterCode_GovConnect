<?php

// Testing URL
//http://localhost/ClusterCode_GovConnect/backend/getTimeSlots.php

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

try {
    $result = Database::search("SELECT * FROM time_slot");

    $slots = [];
    while ($row = $result->fetch_assoc()) {
        $slots[] = $row;
    }

    if (empty($slots)) {
        sendResponse("success", "No available time slots for this service");
    }

    sendResponse("success", "Time slots retrieved", $slots);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
?>