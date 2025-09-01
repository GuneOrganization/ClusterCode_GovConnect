<?php
require __DIR__ . '/connection.php';
session_start();

if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "fail", "message" => "User not logged in"]);
    exit;
}

Database::setUpConnection();

$firstName = Database::$connection->real_escape_string($_POST['first_name']);
$lastName  = Database::$connection->real_escape_string($_POST['last_name']);
$email     = Database::$connection->real_escape_string($_POST['email']);
$mobile    = Database::$connection->real_escape_string($_POST['mobile']);
$newPass   = $_POST['new_password'] ?? '';
$rePass    = $_POST['retype_password'] ?? '';

$userNic = $_SESSION['user']['nic'];

if (!empty($newPass) && !empty($rePass)) {
    if ($newPass !== $rePass) {
        echo json_encode(["status" => "fail", "message" => "Passwords do not match"]);
        exit;
    }

    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
    Database::iud("UPDATE `user` 
                   SET `first_name`='$firstName', `last_name`='$lastName', `email`='$email', `password`='$hashedPass', `mobile`='$mobile' 
                   WHERE `nic`='$userNic'");
} else {
    Database::iud("UPDATE `user` 
                   SET `first_name`='$firstName', `last_name`='$lastName', `email`='$email', `mobile`='$mobile' 
                   WHERE `nic`='$userNic'");
}

# Update session values too (so frontend reload shows updated names/email)
$_SESSION['user']['first_name'] = $firstName;
$_SESSION['user']['last_name']  = $lastName;
$_SESSION['user']['email']      = $email;

echo json_encode(["status" => "success", "message" => "Profile updated successfully"]);
