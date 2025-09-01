<?php
require 'connection.php';

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

$referenceNumber = $data['reference_number'] ?? '';

$response = [
    "status" => "fail",
    "message" => "",
];


if (empty($referenceNumber)) {
    $response["message"] = "Missing reference number";
} else {
    $result = Database::search("
        SELECT reference_number FROM appointment 
        WHERE reference_number = '$referenceNumber'
    ");

    if ($result->num_rows === 0) {
        $response["message"] = "Appointment not found";
    } else {
        Database::iud("
            DELETE FROM appointment 
            WHERE reference_number = '$referenceNumber'
        ");

        $response["status"] = "success";
        $response["message"] = "Appointmnet Canceled successfully";
    }
}

echo json_encode($response);
