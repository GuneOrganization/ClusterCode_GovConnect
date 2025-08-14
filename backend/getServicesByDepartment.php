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

if (!isset($_GET['department_id']) || empty($_GET['department_id'])) {
    sendResponse("fail", "Department id is required");
}

$department_id = intval($_GET['department_id']);

try {
    $resultSet = Database::search("SELECT * FROM branch WHERE department_id = ".$department_id."");

    $branches = [];
    while ($row = $resultSet->fetch_assoc()) {
        $branches[] = $row;
    }

    sendResponse("success", "Branches retrieved successfully", $branches);

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
