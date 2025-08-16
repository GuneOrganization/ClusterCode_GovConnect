<?php

include 'core/mail-sending/mailSender.php';
include 'core/emailTemplateGenerator.php';

echo MailSender::sendMail("danulagunawardana@gmail.com", "Appointment Booking Confirmation", EmailTemplateGenerator::generateEmailTemplate('
        <div class="content">
            <h2>Hello,</h2>
            <p>We are pleased to inform you that your recent request has been successfully processed through <strong>Gov-Connect</strong>. You can now access your account and track the status of your services seamlessly.</p>

            <a href="http://localhost/clustercode_govconnect/dashboard.php" class="button">Access Your Account</a>

            <p>Thank you for choosing <strong>Gov-Connect</strong> for a smooth and efficient government service experience.</p>
        </div>        
    '));

?>