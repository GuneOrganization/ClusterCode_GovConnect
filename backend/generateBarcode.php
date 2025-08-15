<?php

require 'connection.php';
require './core/Validation.php';
require './core/barcode-generator/vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

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

$user = $_SESSION['user'];

if (!Validation::isValidUser($user['nic'])) {
    sendResponse("fail", "Invalid User");
}

$refNo = $_GET['refNo'] ?? '';

if (!$refNo) {
    sendResponse("fail", "No Reference Number");
}

try {

    $resultSet = Database::search("SELECT * FROM appointment a
    INNER JOIN appointment_status s ON a.appointment_status_id = s.id
    WHERE a.reference_number='{$refNo}' AND a.added_user_nic= '" . $user['nic'] . "' AND s.status ='Accepted' ");

    if ($resultSet->num_rows != 0) {
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode('APP0000001', $generator::TYPE_CODE_128);

        header('Content-Type: image/png');
        echo $barcode;
    } else {
        sendResponse("fail", "Invalid User or appointment for generate barcode");
    }

} catch (Exception $e) {
    sendResponse("fail", "Server error: " . $e->getMessage());
}
?>