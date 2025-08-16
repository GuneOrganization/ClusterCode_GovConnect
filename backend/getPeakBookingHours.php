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
        COUNT(a.reference_number) AS total_bookings
    FROM appointment a
    JOIN time_slot ts ON a.time_slot_id = ts.id
    GROUP BY ts.start_time
    ORDER BY total_bookings DESC
    LIMIT 5;
");

$data = array();
while ($appointment = $result->fetch_assoc()) {
    $data[] = $appointment;
}
sendResponse(true, "Peak Booking Hours Retrieved", $data);

?>
