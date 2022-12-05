<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    $mail = PHPMailer(true);
    $mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp-mail.outlook.com';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'phuonghng@outlook.com';     // SMTP username
    $mail->Password   = 'avocado0605';         // SMTP password
    $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 587;                // TCP port to connect to

    $mail->setFrom('phuonghng@outlook.com', 'Phuong Nguyen'); // Set sender of the mail
?>