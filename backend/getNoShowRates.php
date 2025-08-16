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
        COUNT(*) AS total_appointments,
        SUM(CASE WHEN completed_datetime IS NULL AND appointment_date < CURDATE() THEN 1 ELSE 0 END) AS no_shows,
        (SUM(CASE WHEN completed_datetime IS NULL AND appointment_date < CURDATE() THEN 1 ELSE 0 END) / COUNT(*)) * 100 AS no_show_rate
    FROM appointment;
");

$data = array();
while ($appointments = $result->fetch_assoc()) {
    $data[] = $appointments;
}
sendResponse(true, "No Show Rates Retrieved", $data);

?>
