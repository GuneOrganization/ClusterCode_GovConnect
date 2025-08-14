<?php
session_start();
header("Content-Type: application/json");
require 'connection.php';

function sendUserResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}

if (isset($_SESSION['user'])) {
    sendUserResponse("success", "User already logged in", $_SESSION['user']);
} else {
    $input = json_decode(file_get_contents("php://input"), true);

    // $nic = trim($input['nic'] ?? '');
    // $password = trim($input['password'] ?? '');

    $nic = "200127804509";
    $password = "Daham@123";

    if (empty($nic) || empty($password)) {
        sendUserResponse("fail", "NIC and Password are required");
    } else {

        try {
            $result = Database::search(
                "
            SELECT `first_name`,`last_name`,`email`,`role`,`status`,`password` FROM user 
            INNER JOIN user_status ON `user`.`user_status_id` = `user_status`.`id` 
            INNER JOIN user_role ON `user`.`user_role_id` = `user_role`.`id` 
            WHERE nic = '".$nic."' "
            );

            if ($result->num_rows != 0) {

                $user = $result->fetch_assoc();

                if (!password_verify($password, $user['password'])) {
                    
                    //echo(password_hash($password, PASSWORD_DEFAULT));
                    
                    sendUserResponse("fail", "Invalid NIC or Password");
                } else if (strtolower($user['status']) === "Deactive") {
                    sendUserResponse("fail", "User account is deactivated");
                } else {
                    $_SESSION['user'] = [
                        "firstName" => $user['first_name'],
                        "lastName"  => $user['last_name'],
                        "email"     => $user['email']
                    ];

                    sendUserResponse("success", "Login successful", $_SESSION['user']);
                }
            } else {
                sendUserResponse("fail", "User not found");
            }
        } catch (Exception $e) {
            sendUserResponse("fail", "Server error: " . $e->getMessage());
        }
    }
}
