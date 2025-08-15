<?php

session_start();
require "connection.php";

function sendResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];

    $userResultSet = Database::search("SELECT * FROM user WHERE nic = '" . $user["nic"] . "'");
    if ($userResultSet->num_rows == 1) {

        $notificationResultSet = Database::search("SELECT * FROM `notification` WHERE user_nic = '" . $user["nic"] . "'");

        $notifications = array();
        while ($notification = $notificationResultSet->fetch_assoc()) {
            $notifications[] = $notification;
        }
        sendUserResponse(true, "Notifications Retrieved", $notifications);
    }

} else {
    sendResponse("fail", "Something went wrong! Please try again!!");
}

?>