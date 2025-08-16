<?php
session_start();
require "connection.php";
require "core/Validation.php";

$input = json_decode(file_get_contents("php://input"), true);

$nic         = trim($input['nic'] ?? '');
$firstName   = trim($input['firstName'] ?? '');
$lastName    = trim($input['lastName'] ?? '');
$email       = trim($input['email'] ?? '');
$mobile      = trim($input['mobile'] ?? '');
$password    = trim($input['password'] ?? '');
$confirmPassword = trim($input['confirmPassword'] ?? '');
$userStatus  = "Active";
$userRole    = "Citizen";
$regDate     = date("Y-m-d H:i:s");

// $nic         = "200126761234";
// $firstName   = "Sandeep";
// $lastName    = "Kavinda";
// $email       = "dahamn07@gmail.com";
// $mobile      = "0712345678";
// $password    = "Sandeep@123";
// $userStatus  = "Active";
// $userRole    = "Citizen";
// $regDate     = "2025-08-15 01:27:26";

// $response = ["status" => "fail", "message" => "Unknown error"];

function sendResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}


if (!empty($nic) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        if (strlen($nic) <= 12) {

            if (strlen($mobile) == 10 &&  Validation::isValidMobile($mobile)) {
                $checkUser = Database::search("SELECT * FROM `user` WHERE `email` = '$email' OR `nic` = '$nic'");
                if ($checkUser->num_rows === 0) {

                    $roleRes = Database::search("SELECT `id` FROM `user_role` WHERE `role` = '$userRole' LIMIT 1");
                    if ($roleRes->num_rows > 0) {
                        $roleData = $roleRes->fetch_assoc();
                        $roleId = intval($roleData['id']);
                    } else {
                        sendResponse("fail", "Invalid role name.");
                    }

                    $statusRes = Database::search("SELECT `id` FROM `user_status` WHERE `status` = '$userStatus' LIMIT 1");
                    if ($statusRes->num_rows > 0) {
                        $statusData = $statusRes->fetch_assoc();
                        $statusId = intval($statusData['id']);
                    } else {
                        sendResponse("fail", "Invalid status name.");
                    }

                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    Database::iud("
                        INSERT INTO `user` 
                        (`nic`, `first_name`, `last_name`, `email`, `mobile`, `password`, `user_status_id`, `user_role_id`, `registered_datetime`) 
                        VALUES ('$nic', '$firstName', '$lastName', '$email', '$mobile', '$hashedPassword', '$statusId', '$roleId', '$regDate')
                    ");

                    sendResponse("success", "Signup successful. You can login now.");
                } else {
                    sendResponse("fail", "Email or NIC already exists.");
                }
            } else {
                sendResponse("fail", "Invalid Mobile Number");
            }
        } else {
            sendResponse("fail", "Invalid NIC number");
        }
    } else {
        sendResponse("fail", "Invalid email format.");
    }
} else {
    sendResponse("fail", "All fields are required.");
}
