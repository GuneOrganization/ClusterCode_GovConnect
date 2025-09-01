<?php
session_start();
header("Content-Type: application/json");
require 'connection.php';
require 'core/mail-sending/mailSender.php';
require 'core/emailTemplateGenerator.php';
require 'core/customGenerator.php';

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

    $nicOrEmail = trim($input['nicOrEmail'] ?? '');
    $password = trim($input['password'] ?? '');

    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    // echo $hashedPassword;

    if (empty($nicOrEmail) || empty($password)) {
        sendUserResponse("fail", "NIC and Password are required");
    } else {

        try {
            $result = Database::search(
                "
            SELECT `nic`,`first_name`,`last_name`,`email`,`role`,`status`,`password` FROM user 
            INNER JOIN user_status ON `user`.`user_status_id` = `user_status`.`id` 
            INNER JOIN user_role ON `user`.`user_role_id` = `user_role`.`id` 
            WHERE nic = '" . $nicOrEmail . "' OR email = '" . $nicOrEmail . "'"
            );

            if ($result->num_rows != 0) {

                $user = $result->fetch_assoc();

                if (!password_verify($password, $user['password'])) {
                    sendUserResponse("fail", "Invalid NIC or Password");
                } else if (strtolower($user['status']) === "Deactive") {
                    sendUserResponse("fail", "User account is deactivated");
                } else {

                    // $user['password'] = null;
                    // $_SESSION['user'] = $user;

                    $vcode = CustomGenerator::generateVerificationCode();

                    Database::iud("UPDATE `user` SET `verification_code` = '" . $vcode . "' WHERE `nic` = '" . $user["nic"] . "'");

                    $status = MailSender::sendMail($user["email"], "Verification Mail", EmailTemplateGenerator::generateEmailTemplate('
            <div class="content">
                <h2>Verification</h2>
                <p>Hello ' . $user["first_name"] . ',</p>
                <p>We received a request to verify your email address for your <strong>Gov-Connect</strong> account.</p>

                <div class="code-box">' . $vcode . '</div>

                <p>Please enter this code in the verification form to proceed.</p>
                <p>If you did not request this verification, please ignore this email.</p>
            </div>  
        '));

                    if ($status) {
                        $_SESSION["vda"] = [
                            "sts" => "verify",
                            "n" => $user['nic'],
                        ];

                        sendUserResponse("success", "Verification Code sending success. Please check your Email for the Verification Code!", $_SESSION["vda"]);
                    } else {

                        Database::iud("UPDATE `user` SET `verification_code` = '' WHERE `nic` = '" . $user["nic"] . "'");
                        sendUserResponse("fail", "Failed to send verification mail");
                    }
                    
                }
            } else {
                sendUserResponse("fail", "User not found");
            }
        } catch (Exception $e) {
            sendUserResponse("fail", "Server error: " . $e->getMessage());
        }
    }
}
