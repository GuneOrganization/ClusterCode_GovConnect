<?php
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

$result = Database::search("
    SELECT 
        ts.start_time,
        ts.end_time,
        COUNT(a.reference_number) AS total_appointments
    FROM time_slot ts
    LEFT JOIN appointment a ON a.time_slot_id = ts.id
    GROUP BY ts.id
    ORDER BY ts.start_time;
");

$data = array();
while ($appointment = $result->fetch_assoc()) {
    $data[] = $appointment;
}
sendResponse("success", "Hourly Appointments Retrieved", $data);

?>
