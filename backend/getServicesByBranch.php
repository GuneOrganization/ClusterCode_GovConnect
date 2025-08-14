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

if (!isset($_GET['branch_id']) || empty($_GET['branch_id'])) {
    sendResponse("fail", "Branch id is required");
}

try {
    $resultSet = Database::search("SELECT * FROM `service` WHERE `branch_id` = '".$_GET['branch_id']."' ");

    $services = [];
    while ($row = $resultSet->fetch_assoc()) {
        $services[] = $row;
    }

    sendResponse("success", "Services retrieved successfully", $services);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
