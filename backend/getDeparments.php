<?php
session_start();

require 'connection.php';

$response = array();

if (isset($_SESSION['user'])) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Unauthorized. Please log in."
    ]);

} else {
    
    try {
        $query = "SELECT * FROM `department`";
        $resultset = Database::search($query);

        if ($resultset->num_rows > 0) {
            $departments = array();
            while ($row = $resultset->fetch_assoc()) {
                $departments[] = $row;
            }
            $response["status"] = "success";
            $response["data"] = $departments;
        } else {
            $response["status"] = "success";
            $response["data"] = [];
            $response["message"] = "No departments found.";
        }
    } catch (Exception $e) {
        http_response_code(500);
        $response["status"] = "error";
        $response["message"] =  $e->getMessage();
    }

    echo json_encode($response);
}
