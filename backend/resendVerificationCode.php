<?php

session_start();
require 'connection.php';
require 'core/customGenerator.php';
require 'core/emailTemplateGenerator.php';
require 'core/mail-sending/mailSender.php';

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

    $resultSet = Database::search("SELECT * FROM `user` WHERE nic = '" . $data["n"] . "'");

    if ($resultSet->num_rows == 1) {

        $vcode = CustomGenerator::generateVerificationCode();

        $user = $resultSet->fetch_assoc();

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

            sendResponse("success", "Verify", $_SESSION["vda"]);
        } else {

            Database::iud("UPDATE `user` SET `verification_code` = '' WHERE `nic` = '" . $user["nic"] . "'");
            sendResponse("fail", "Failed to send verification mail");
        }
    }
} else {
    sendResponse("fail", "Something went wrong! Please try again!!");
}
