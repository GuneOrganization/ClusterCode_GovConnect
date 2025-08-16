<?php

session_start();
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

if (isset($_SESSION["vda"])) {

    $data = $_SESSION["vda"];

    $resultSet = Database::search(
        "
            SELECT `nic`,`first_name`,`last_name`,`email`,`role`,`status`,`password` FROM user 
            INNER JOIN user_status ON `user`.`user_status_id` = `user_status`.`id` 
            INNER JOIN user_role ON `user`.`user_role_id` = `user_role`.`id` 
            WHERE nic = '" . $data["n"] . "'"
    );

    if ($resultSet->num_rows == 1) {

        $user = $resultSet->fetch_assoc();

        Database::iud("UPDATE `user` SET `verification_code` = '' WHERE `nic` = '" . $user["nic"] . "'");

        $_SESSION["vda"] = null;
        session_destroy();

        $user['password'] = null;

        session_start();
        $_SESSION['user'] = $user;

        sendResponse("success", "User Verification Success :)", $_SESSION["user"]);
    } else {
        sendResponse("fail", "Something went wrong! Please try again!!");
    }
} else {
    sendResponse("fail", "Something went wrong! Please try again!!");
}
