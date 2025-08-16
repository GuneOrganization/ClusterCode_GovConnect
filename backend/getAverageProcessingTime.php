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
        SEC_TO_TIME(AVG(TIMESTAMPDIFF(SECOND, accepted_datetime, completed_datetime))) AS avg_processing_time
    FROM appointment
    WHERE completed_datetime IS NOT NULL 
      AND accepted_datetime IS NOT NULL;
");

$row = $result->fetch_assoc();
sendResponse(true, "No Show Rates Retrieved", $row);

?>
