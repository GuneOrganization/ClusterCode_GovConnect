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

if (!isset($_GET['service_id']) || empty($_GET['service_id'])) {
    sendResponse("fail", "Service id is required");
}

try {
    $resultSet = Database::search("SELECT * FROM service_document sd 
    INNER JOIN document_type dt ON sd.document_type_id = dt.id 
    WHERE service_id = '".$_GET['service_id']."'");

    $documents = [];
    while ($row = $resultSet->fetch_assoc()) {
        $documents[] = $row;
    }

    sendResponse("success", "Documents retrieved successfully", $documents);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}

?>