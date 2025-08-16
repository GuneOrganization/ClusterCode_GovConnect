<?php
session_start();
require "connection.php";
require "core/mail-sending/mailSender.php";
require "core/emailTemplateGenerator.php";

$input = json_decode(file_get_contents("php://input"), true);

// $nic         = trim($input['nic'] ?? '');
// $firstName   = trim($input['first_name'] ?? '');
// $lastName    = trim($input['last_name'] ?? '');
// $email       = trim($input['email'] ?? '');
// $mobile      = trim($input['mobile'] ?? '');
// $password    = trim($input['password'] ?? '');
// $userStatus  = intval($input['user_status_id'] ?? 1);
// $userRole    = intval($input['user_role_id'] ?? 2);
// $regDate     = date("Y-m-d H:i:s");

$nic         = "200126761234";
$firstName   = "Sandeep";
$lastName    = "Kavinda";
$email       = "dahamn07@gmail.com";
$mobile      = "0712345678";
$password    = "Sandeep@123";
$userStatus  = "Active";
$userRole    = "Citizen";
$regDate     = "2025-08-15 01:27:26";

$response = ["status" => "fail", "message" => "Unknown error"];

if (!empty($nic) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $checkUser = Database::search("SELECT * FROM `user` WHERE `email` = '$email' OR `nic` = '$nic'");
        if ($checkUser->num_rows === 0) {

            $roleRes = Database::search("SELECT `id` FROM `user_role` WHERE `role` = '$userRole' LIMIT 1");
            if ($roleRes->num_rows > 0) {
                $roleData = $roleRes->fetch_assoc();
                $roleId = intval($roleData['id']);
            } else {
                $response = ["status" => "fail", "message" => "Invalid role name."];
                echo json_encode($response);
                return;
            }

            $statusRes = Database::search("SELECT `id` FROM `user_status` WHERE `status` = '$userStatus' LIMIT 1");
            if ($statusRes->num_rows > 0) {
                $statusData = $statusRes->fetch_assoc();
                $statusId = intval($statusData['id']);
            } else {
                $response = ["status" => "fail", "message" => "Invalid status name."];
                echo json_encode($response);
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $verificationCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            Database::iud("
                INSERT INTO `user` 
                (`nic`, `first_name`, `last_name`, `email`, `mobile`, `password`, `user_status_id`, `user_role_id`, `registered_datetime`, `verification_code`) 
                VALUES ('$nic', '$firstName', '$lastName', '$email', '$mobile', '$hashedPassword', '$statusId', '$roleId', '$regDate', '$verificationCode')
            ");

            $subject = "Your Verification Code";
            $body = "Hello $firstName,<br><br>Your verification code is: <b>$verificationCode</b><br><br>Regards,<br>GovConnect Team";

            if (MailSender::sendMail($email, $subject, EmailTemplateGenerator::generateEmailTemplate(' 
            <div class="content">
                  <h2>Hello, '.$firstName.'</h2>
                  <p>We are pleased to inform you that your account registration has been successfully received.</p>
                  <p>Your verification code is: '.$verificationCode.'</p>
                  <p>Please enter this code in the verification page to activate your account.</p>
                  <a href="http://localhost/clustercode_govconnect/userVerificationPage.php">Click Here</a>

                  <p>Thank you for choosing <strong>Gov-Connect</strong> for a smooth and efficient government service experience.</p>
             </div>'
           ))) {
                $response = ["status" => "success", "message" => "Signup successful. Please check your email for the verification code."];
            } else {
                $response = ["status" => "success", "message" => "Signup successful, but email could not be sent."];
            }
        } else {
            $response = ["status" => "fail", "message" => "Email or NIC already exists."];
        }
    } else {
        $response = ["status" => "fail", "message" => "Invalid email format."];
    }
} else {
    $response = ["status" => "fail", "message" => "All fields are required."];
}

echo json_encode($response);
