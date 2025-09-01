<?php
require 'connection.php';

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

$referenceNumber = $data['reference_number'] ?? '';
$rating = $data['rating'] ?? '';
$feedback = $data['feedback'] ?? '';

// $referenceNumber = "APP0000001";
// $rating = "5";
// $feedback = "Good service!";

$response = [
    "status" => "fail",
    "message" => "",
];


if (empty($referenceNumber) || empty($rating) || empty($feedback)) {
    $response["message"] = "Missing reference number, rating, or feedback";
} else if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
    $response["message"] = "Rating must be between 1 and 5";
} else {
    $result = Database::search("
        SELECT reference_number FROM appointment 
        WHERE reference_number = '$referenceNumber'
    ");

    if ($result->num_rows === 0) {
        $response["message"] = "Appointment not found";
    } else {
        $escapedFeedback = Database::$connection->real_escape_string($feedback);
        Database::iud("
            UPDATE appointment 
            SET rating = '$rating', feedback = '$escapedFeedback' 
            WHERE reference_number = '$referenceNumber'
        ");

        $response["status"] = "success";
        $response["message"] = "Feedback submitted successfully";
    }
}

echo json_encode($response);
