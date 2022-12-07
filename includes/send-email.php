<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require "../vendor/autoload.php";

    date_default_timezone_set('America/Halifax');
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.office365.com';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'mail@server.com';     // SMTP username
    $mail->Password   = 'mailpassword';         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 587;                // TCP port to connect to

    $mail->setFrom('mail@server.com', 'Name'); // Set sender of the mail
?>