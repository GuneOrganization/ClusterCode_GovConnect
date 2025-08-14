<?php

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'host';
$mail->SMTPAuth = true;
$mail->Username = 'email';
$mail->Password = 'password';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->isHTML(true);

?>