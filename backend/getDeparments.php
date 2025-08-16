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

if (isset($_SESSION['user'])) {
    sendResponse("fail", "No logged user found");
}

if (!Validation::isValidUser($_SESSION['user']['nic'])) {
    sendResponse("fail", "Invalid User");
}

try {
    $query = "SELECT * FROM `department`";
    $resultset = Database::search($query);

    if ($resultset->num_rows > 0) {
        $departments = array();
        while ($row = $resultset->fetch_assoc()) {
            $departments[] = $row;
        }

        sendResponse("success", "Get Departments Successful", $departments);
    } else {
        sendResponse("success", "No Departments Found", []);
    }
} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
?>