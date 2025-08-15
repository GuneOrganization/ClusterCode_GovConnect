<?php

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

class MailSender
{
    private static $mail;

    private static function setupMailSender()
    {
        if (!isset(self::$mail)) {
            self::$mail = new PHPMailer();
            self::$mail->isSMTP();
            self::$mail->Host = 'smtp.gmail.com';
            self::$mail->SMTPAuth = true;
            self::$mail->Username = 'clustercodeofficial@gmail.com';
            self::$mail->Password = 'oepilqdycttldkpf';
            self::$mail->SMTPSecure = 'ssl';
            self::$mail->Port = 465;
            self::$mail->isHTML(true);
        }
    }

    public static function sendMail($to, $subject, $body)
    {
        self::setupMailSender();

        self::$mail->setFrom('mail@clustercode.com', 'Official Message');
        self::$mail->addAddress($to);
        self::$mail->Subject = $subject;
        self::$mail->Body = $body;

        return self::$mail->send();
    }
}
