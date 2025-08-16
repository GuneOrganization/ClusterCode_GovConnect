<?php
require 'connection.php';
require "core/mail-sending/mailSender.php";
require "core/emailTemplateGenerator.php";

// Read JSON body
$input = json_decode(file_get_contents("php://input"), true);

$response = ["success" => false, "message" => "Unknown error"];

if (isset($input['reference_number'], $input['status'])) {
    $ref = $input['reference_number'];
    $status_id = $input['status'];
    $reason = $input['rejected_reason'] ?? null;

    echo "Reference Number: $ref, Status ID: $status_id, Reason: $reason";

    try {
        // Update query
        $stmt = Database::iud(
            "UPDATE appointment 
             SET appointment_status_id = '$status_id', rejected_message = '$reason'
             WHERE reference_number = '$ref'"
        );
         $response = ["success" => true, "message" => "Appointment updated"];

         $result = Database::search("SELECT first_name, email FROM `appointment` 
                                     INNER JOIN `user` ON `appointment`.`added_user_nic` = `user`.`nic`
                                     WHERE `reference_number` = '$ref'");

         $appoinment_result = Database::search("SELECT * FROM `appointment_status` 
                                     WHERE `id` = '$status_id'");                            
         
         $data = $result->fetch_assoc();
         $user_email = $data['email'];
         $firstName = $data['first_name'];
         $subject = "Appointment Status Update";
         $appointment_status = $appoinment_result->fetch_assoc()['status'];

         echo "User Email: $user_email, First Name: $firstName, Subject: $subject, Appointment Status: $appointment_status";
            if (MailSender::sendMail(
                $user_email,
                $subject,
                EmailTemplateGenerator::generateEmailTemplate('
                <div class="content">
                      <h2>Hello, '.$firstName.'</h2>
                      <p>We are pleased to inform you that your appointment status has been changed.</p>
                      <p>Your current appointment status: <b>'.$appointment_status.'</b> </p>
                      <p>Thank you for choosing <strong>Gov-Connect</strong> for a smooth and efficient government service experience.</p>
                 </div>'
                )
            )) {
                $response = ["success" => true, "message" => "Appointment updated and email sent"];
            } else {
               $response = ["success" => true, "message" => "Appointment updated but email doen't sent"];
            }

    } catch (Exception $e) {
        $response["message"] = $e->getMessage();
    }
} else {
    $response["message"] = "Invalid data sent";
}

// Return JSON
header("Content-Type: application/json");
echo json_encode($response);
